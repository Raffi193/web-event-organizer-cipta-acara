<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CiptaAcara - Booking</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #2c37d3;
            --primary-dark: #5026e8;
            --black: #000000;
            --white: #FFFFFF;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f8f8;
            color: var(--black);
            transition: background-color 0.3s;
        }

        body.dark {
            background-color: #121212;
            color: var(--white);
        }

        h1,
        h2,
        h3 {
            font-family: 'Playfair Display', serif;
        }

        .bg-pattern {
            background-image: url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            filter: blur(4px) brightness(0.7);
            opacity: 0.2;
        }

        .price-card {
            transition: all 0.2s ease;
        }

        .price-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }

        .price-card.selected {
            border: 2px solid var(--primary);
            background-color: rgba(46, 125, 50, 0.05);
        }

        .dark .price-card {
            background-color: #1e1e1e;
            color: var(--white);
        }

        .dark .price-card.selected {
            background-color: rgba(46, 125, 50, 0.2);
        }

        .vendor-badge {
            background-color: rgba(46, 125, 50, 0.1);
            color: var(--primary);
        }

        .dark .vendor-badge {
            background-color: rgba(46, 125, 50, 0.3);
        }

        .form-input {
            transition: all 0.2s;
        }

        .form-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(46, 125, 50, 0.2);
        }

        .dark .form-input {
            background-color: #2d2d2d;
            border-color: #444;
            color: var(--white);
        }

        .btn-primary {
            background-color: var(--primary);
            transition: all 0.2s;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-1px);
        }

        .modal {
            transition: opacity 0.2s, visibility 0.2s;
        }

        .modal-content {
            transform: scale(0.9);
            transition: transform 0.2s;
        }

        .modal.active {
            opacity: 1;
            visibility: visible;
        }

        .modal.active .modal-content {
            transform: scale(1);
        }

        .loading-spinner {
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <!-- Background Pattern -->
    <div class="fixed inset-0 bg-pattern -z-10"></div>

    <!-- Header -->
    <header class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center">
                <a href="/" class="ml-3 text-2xl font-bold font-serif">CiptaAcara</a>
            </div>
            <button id="theme-toggle" class="p-2 rounded-full hover:bg-gray-200">
                <i class="fas fa-moon"></i>
                <i class="fas fa-sun hidden text-yellow-300"></i>
            </button>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="max-w-4xl mx-auto">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-serif font-bold mb-4">Pesan Layanan Event Organizer</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">Pilih paket yang sesuai dengan kebutuhan acara Anda
                    dan isi
                    detail informasi untuk memulai proses booking.</p>
            </div>

            <!-- Booking Form -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                <form action="/order" method="POST">
                    @csrf
                    <div class="p-6 sm:p-8">
                        <!-- Step 1: Pricelist Selection -->
                        <div class="mb-10">
                            <h3 class="text-xl font-serif font-semibold mb-6">Pilih Paket Layanan</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">

                                @foreach ($pricelists as $pricelist)
                                    <label class="cursor-pointer">
                                        <input type="radio" name="pricelist_id" value="{{ $pricelist->id }}"
                                            class="peer hidden" data-name="{{ $pricelist->title }}" data-duration="1"
                                            data-price="{{ $pricelist->price }}" />
                                        <div
                                            class="p-4 transition-all duration-300 ease-in-out 
                                            hover:-translate-y-[3px] hover:shadow-lg active:translate-y-0 active:shadow-md rounded-xl border border-transparent peer-checked:border-indigo-500 bg-white shadow">
                                            <h3 class="text-lg font-semibold">{{ $pricelist->title }}</h3>
                                            <p class="text-sm text-gray-500">{{ $pricelist->description }}</p>
                                            <p class="text-xl font-bold mt-2">
                                                {{ 'Rp ' . number_format($pricelist->price, 0, ',', '.') }}</p>
                                        </div>
                                    </label>
                                @endforeach

                            </div>

                        </div>

                        <!-- Step 2: Event Details -->
                        <div class="mb-10">
                            <h3 class="text-xl font-serif font-semibold mb-6">Detail Acara</h3>

                            <!-- Date Range Picker -->
                            <div class="mb-6">
                                <input type="hidden" name="duration" id="duration" value="0">
                                <label for="event-duration" class="block text-sm font-medium mb-2">Durasi Acara</label>
                                <div class="flex flex-col sm:flex-row gap-4">
                                    <div class="flex-1">
                                        <input type="date" name="start_date" id="start-date"
                                            class="w-full form-input px-4 py-3 rounded-lg border border-gray-300"
                                            required>
                                    </div>
                                    <div class="flex-1">
                                        <input type="date" id="end-date"
                                            class="w-full form-input px-4 py-3 rounded-lg border border-gray-300"
                                            name="end_date" required>
                                    </div>
                                </div>
                                <div class="mt-2 text-sm text-gray-500">
                                    <span id="duration-display">0 Hari</span>
                                </div>
                            </div>

                            <!-- Customer Information -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                                <div>
                                    <label for="full-name" class="block text-sm font-medium mb-2">Nama Lengkap</label>
                                    <input type="text" id="full-name"
                                        class="w-full form-input px-4 py-3 rounded-lg border border-gray-300"
                                        name="customer_name" placeholder="Isi nama anda" required>
                                </div>
                                <div>
                                    <label for="whatsapp" class="block text-sm font-medium mb-2">Nomor WhatsApp</label>
                                    <input type="tel" id="whatsapp"
                                        class="w-full form-input px-4 py-3 rounded-lg border border-gray-300"
                                        name="whatsapp" placeholder="Isi nomor whatsapp anda" required>
                                </div>
                            </div>

                            <div class="mb-6">
                                <label for="event-address" class="block text-sm font-medium mb-2">Alamat Acara</label>
                                <div class="relative">
                                    <textarea id="event-address" rows="3" class="w-full form-input px-4 py-3 rounded-lg border border-gray-300"
                                        required name="address" placeholder="Isi alamat anda"></textarea>
                                    <div class="absolute right-3 bottom-3 text-gray-400">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Price Summary -->
                        <div class="bg-gray-50 rounded-lg p-6 mb-8">
                            <h4 class="font-serif font-medium mb-4">Ringkasan Pesanan</h4>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Paket Layanan</span>
                                    <span id="selected-package" class="font-medium">-</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Durasi</span>
                                    <span id="summary-duration">0 Hari</span>
                                </div>
                                <div class="border-t border-gray-200 my-2"></div>
                                <div class="flex justify-between text-lg font-bold">
                                    <span>Total Biaya</span>
                                    <span id="total-price">Rp0</span>
                                </div>
                            </div>
                        </div>

                        <div class="flex mt-8">
                            <a href="{{ route('landing') }}"
                                class="w-64 mr-auto bg-gray-800 hover:bg-gray-700 text-white py-4 px-6 rounded-lg flex items-center justify-center hover:-translate-y-[1px] active:translate-y-0 transition duration-300">
                                Kembali
                            </a>
                            <!-- Submit Button -->
                            <button type="submit"
                                class="w-64 ml-auto btn-primary text-white py-4 px-6 rounded-lg font-medium text-lg flex items-center justify-center">
                                <span>Pesan Sekarang</span>
                                <i class="fas fa-calendar-check ml-2"></i>
                                <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- Footer -->
    @include('partials.footer')
    <script>
        // Fungsi untuk mengambil data dari radio button yang dipilih
        function getSelectedPricelist() {
            const selected = document.querySelector('input[name="pricelist_id"]:checked');
            if (!selected) return null;
            return {
                name: selected.dataset.name,
                price: parseInt(selected.dataset.price),
                duration: parseInt(selected.dataset.duration)
            };
        }

        // Hitung durasi antara dua tanggal
        function calculateDuration(startDateStr, endDateStr) {
            if (!startDateStr || !endDateStr) return 0;
            const start = new Date(startDateStr);
            const end = new Date(endDateStr);
            const diffTime = Math.abs(end - start);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1; // termasuk hari terakhir
            return diffDays;
        }

        // Update ringkasan pesanan
        function updateSummary() {
            const pricelist = getSelectedPricelist();
            const startDate = document.getElementById("start-date").value;
            const endDate = document.getElementById("end-date").value;

            const duration = calculateDuration(startDate, endDate);
            const totalPrice = pricelist ? pricelist.price * duration : 0;

            // Tampilkan hasil di UI
            document.getElementById("selected-package").textContent = pricelist?.name || "-";
            document.getElementById("summary-duration").textContent = `${duration} Hari`;
            document.getElementById("total-price").textContent = `Rp${totalPrice.toLocaleString('id-ID')}`;
            document.getElementById("duration-display").textContent = `${duration} Hari`;
            document.getElementById("duration").value = duration;
        }

        // Event listener untuk radio button dan input tanggal
        document.querySelectorAll('input[name="pricelist_id"]').forEach(input => {
            input.addEventListener("change", updateSummary);
        });

        document.getElementById("start-date").addEventListener("change", updateSummary);
        document.getElementById("end-date").addEventListener("change", updateSummary);

        // Inisialisasi awal
        updateSummary();
    </script>

</body>

</html>
