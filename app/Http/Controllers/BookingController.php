<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Pricelist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Xendit\Configuration;
use Xendit\Invoice\CreateInvoiceRequest;
use Xendit\Invoice\InvoiceApi;

class BookingController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        return view('dashboard.bookings.index', [
            'bookings' => Booking::with(['pricelist'])->get()
        ]);
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('order', [
            'pricelists' => Pricelist::with(['photographer', 'mc', 'decoration'])->get()
        ]);
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // validasi
        $validated = $request->validate([
            'pricelist_id' => 'required|exists:pricelists,id',
            'duration' => 'required|numeric|min:1',
            'address' => 'required',
            'customer_name' => 'required|max:255',
            'whatsapp' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        // PERBAIKAN: Menyediakan key 'username' untuk Model/Observer yang membutuhkannya.
        $validated['username'] = $validated['customer_name']; 

        // generate data pricelist yang dipilih
        $pricelist = Pricelist::find($validated['pricelist_id']);

        // calculate price total
        $validated['price_total'] = $pricelist->price * $validated['duration'];

        // setting external ID => nyocokin transaksi lokal dengan invoice yang ada di xendit
        $externalId = 'invoice-' . $validated['whatsapp'] . '-' . Carbon::now()->format('Ymd-H:i:s');
        $validated['external_id'] = $externalId;

        // configurasi xendit => payment
        Configuration::setXenditKey(env('XENDIT_API_KEY'));
        $invoiceApi = new InvoiceApi();

        // invoice parameters
        $invoiceRequest = new CreateInvoiceRequest([
            'external_id' => $externalId,
            'description' => 'Booking Momenta EO dari: ' . $validated['customer_name'] . '. Paket: ' . $pricelist->title . ', durasi: ' . $validated['duration'] . 'hari. Total biaya : Rp.' . number_format($validated['price_total'], 0, ',', '.'),
            'amount' => $validated['price_total'],
            'currency' => 'IDR',
            'customer' => [
                'given_names' => $validated['customer_name'],
                'mobile_number' => $validated['whatsapp']
            ],
            'items' => [
                [
                    'name' => $pricelist->title,
                    'quantity' => $validated['duration'],
                    'price' => $pricelist->price
                ]
            ],
            'success_redirect_url' => env('APP_URL') . "/payment/success/$externalId",
            'failure_redirect_url' => env('APP_URL') . "/payment/failure/$externalId",
            'fees' => [
                [
                    'type' => 'ADMIN',
                    'value' => 0,
                ]
            ]
        ]);

        try{
            $result = $invoiceApi->createInvoice($invoiceRequest);
            $validated['invoice_url'] = $result['invoice_url'];
            
            // Simpan Booking ke Database
            Booking::create($validated);

            // send wa massage => twilio (BLOK INI SEKARANG DIBUNGKUS try-catch SEHINGGA TIDAK MENGGANGGU ALUR UTAMA)
            try{
                $twilio = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));
                $twilio->messages->create(
                    "whatsapp:" . env('TWILIO_WHATSAPP_TO'),
                    [
                        "from" => "whatsapp:+14155238886",
                        "body" => "Terimakasih sudah melakukan booking di momenta EO. Segera selesaikan pembayaran anda",
                    ]
                );
            }catch(\Exception $e){
                
            }

            // redirect ke Xendit
            return redirect($result['invoice_url']);
            
        } catch (\Xendit\XenditSdkException $e) {
            // Tampilkan error Xendit
            echo 'Exception when calling InvoiceApi->createInvoice: ', $e->getMessage(), PHP_EOL;
            echo 'Full Error: ', json_encode($e->getFullError()), PHP_EOL;
        }

    }

    public function paymentSuccess($externalId)
    {
        Configuration::setXenditKey(env('XENDIT_API_KEY'));
        $invoiceApi = new InvoiceApi();
        $result = $invoiceApi->getInvoices(null, $externalId);
        $booking = Booking::where('external_id', $externalId)->first();
        $pricelist = $booking->pricelist;
        $booking->update([
            'transaction_status' => $result[0]['status']
        ]);

        // send wa massage => twilio
        $twilio = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));
        try {
            $twilio->messages->create(
                "whatsapp:" . env('TWILIO_WHATSAPP_TO'),
                [
                    "from" => "whatsapp:+14155238886",
                    "body" => "Terimakasih sudah melakukan pembayaran di momenta EO. Kami akan membantu anda bahagia.",
                ]
            );
        } catch (\Exception $e) {
            // Log::error Twilio
        }

        return view('payments.success');
    }

    public function paymentFailure($externalId)
    {
        $booking = Booking::where('external_id', $externalId)->first();
        if (!$booking) {
             return view('payments.failure', ['message' => 'Booking not found']);
        }
        $pricelist = $booking->pricelist;
        $booking->update([
            'transaction_status' => 'gagal'
        ]);

        // send wa massage => twilio
        $twilio = new Client(env('TWILIO_SID'), env('TWILIO_TOKEN'));
        try {
            $twilio->messages->create(
                "whatsapp:" . env('TWILIO_WHATSAPP_TO'),
                [
                    "from" => "whatsapp:+14155238886",
                    "body" => "Pembayaran anda pada booking Momenta EO gagal!",
                ]
            );
        } catch (\Exception $e) {
            // Log::error Twilio
        }


        return view('payments.failure');
    }
}
