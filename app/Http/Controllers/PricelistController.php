<?php

namespace App\Http\Controllers;

use App\Models\Pricelist;
use App\Models\Decoration;
use Illuminate\Support\Str;
use App\Models\Photographer;
use Illuminate\Http\Request;
use App\Models\MasterOfCeremony;

class PricelistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.pricelists.index', [
            'pricelists' => Pricelist::with(['photographer', 'mc', 'decoration'])->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pricelists.create', [
            'photographers' => Photographer::all(),
            'mcs' => MasterOfCeremony::all(),
            'decorations' => Decoration::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:pricelists,title',
            'mc_slug' => 'required|exists:master_of_ceremonies,slug',
            'photographer_slug' => 'required|exists:photographers,slug',
            'decoration_slug' => 'required|exists:decorations,slug',
            'price' => 'required|numeric|min:1',
            'description' => 'required|string',
        ]);

        $baseSlug = Str::slug($validated['title']);
        $slug = $baseSlug;
        $counter = 1;

        while (Pricelist::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        $validated['photographer_id'] = Photographer::where('slug', $validated['photographer_slug'])->first()->id;
        $validated['decoration_id'] = Decoration::where('slug', $validated['decoration_slug'])->first()->id;
        $validated['master_of_ceremony_id'] = MasterOfCeremony::where('slug', $validated['mc_slug'])->first()->id;

        unset($validated['mc_slug']);
        unset($validated['photographer_slug']);
        unset($validated['decoration_slug']);

        Pricelist::create(array_merge($validated, ['slug' => $slug]));

        return redirect()->route('pricelists.index')
            ->with('success', 'Pricelist : ' . $validated['title'] . ' berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pricelist $pricelist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pricelist $pricelist)
    {
        return view('dashboard.pricelists.edit', [
            'pricelist' => $pricelist,
            'photographers' => Photographer::all(),
            'mcs' => MasterOfCeremony::all(),
            'decorations' => Decoration::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pricelist $pricelist)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:pricelists,title',
            'mc_slug' => 'required|exists:master_of_ceremonies,slug',
            'photographer_slug' => 'required|exists:photographers,slug',
            'decoration_slug' => 'required|exists:decorations,slug',
            'price' => 'required|numeric|min:1',
            'description' => 'required|string',
        ]);

        // Jika nama berubah, generate slug baru
        if ($pricelist->title !== $validated['title']) {
            $baseSlug = Str::slug($validated['title']);
            $newSlug = $baseSlug;
            $counter = 1;

            while (Pricelist::where('slug', $newSlug)->where('id', '!=', $pricelist->id)->exists()) {
                $newSlug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $validated['slug'] = $newSlug;
        }

        $validated['photographer_id'] = Photographer::where('slug', $validated['photographer_slug'])->first()->id;
        $validated['decoration_id'] = Decoration::where('slug', $validated['decoration_slug'])->first()->id;
        $validated['master_of_ceremony_id'] = MasterOfCeremony::where('slug', $validated['mc_slug'])->first()->id;

        unset($validated['mc_slug']);
        unset($validated['photographer_slug']);
        unset($validated['decoration_slug']);

        $pricelist->update($validated);

        return redirect()->route('pricelists.index')
            ->with('success', 'Pricelist : ' . $pricelist->title . ' berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pricelist $pricelist)
    {
        $pricelist = Pricelist::where('slug', $pricelist->slug)->firstOrFail();
        $pricelist->delete();

        return redirect()->route('pricelists.index')
            ->with('success', 'Pricelist : ' . $pricelist->name . ' berhasil dihapus!');
    }
}
