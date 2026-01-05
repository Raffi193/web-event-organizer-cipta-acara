<?php

namespace App\Http\Controllers;

use App\Models\MasterOfCeremony;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MasterOfCeremonyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.vendors.index', [
            'title' => "MC",
            'route' => 'mc',
            'vendors' => MasterOfCeremony::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.vendors.create', [
            'title' => "MC",
            'route' => 'mc'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:photographers,name',
            'services' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
        ]);

        $baseSlug = Str::slug($validated['name']);
        $slug = $baseSlug;
        $counter = 1;

        while (MasterOfCeremony::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        MasterOfCeremony::create(array_merge($validated, ['slug' => $slug]));

        return redirect()->route('mc.index')
            ->with('success', 'MC : ' . $validated['name'] . ' berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterOfCeremony $masterOfCeremony)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($masterOfCeremony)
    {
        $masterOfCeremony = MasterOfCeremony::where('slug', $masterOfCeremony)->first();
        return view('dashboard.vendors.edit', [
            'title' => "MC",
            'route' => 'mc',
            'vendor' => $masterOfCeremony
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $masterOfCeremony)
    {
        $masterOfCeremony = MasterOfCeremony::where('slug', $masterOfCeremony)->first();
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:master_of_ceremonies,name,' . $masterOfCeremony->slug . ',slug',
            'services' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
        ]);

        $masterOfCeremony = MasterOfCeremony::where('slug', $masterOfCeremony->slug)->firstOrFail();

        // Jika nama berubah, generate slug baru
        if ($masterOfCeremony->name !== $validated['name']) {
            $baseSlug = Str::slug($validated['name']);
            $newSlug = $baseSlug;
            $counter = 1;

            while (MasterOfCeremony::where('slug', $newSlug)->where('id', '!=', $masterOfCeremony->id)->exists()) {
                $newSlug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $validated['slug'] = $newSlug;
        }

        $masterOfCeremony->update($validated);

        return redirect()->route('mc.index')
            ->with('success', 'MC : ' . $masterOfCeremony->name . ' berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($masterOfCeremony)
    {
        $masterOfCeremony = MasterOfCeremony::where('slug', $masterOfCeremony)->firstOrFail();
        $masterOfCeremony->delete();

        return redirect()->route('mc.index')
            ->with('success', 'MC : ' . $masterOfCeremony->name . ' berhasil dihapus!');
    }
}
