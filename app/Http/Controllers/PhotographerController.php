<?php

namespace App\Http\Controllers;

use App\Models\Photographer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PhotographerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.vendors.index', [
            'title' => "Fotografer",
            'route' => 'photographers',
            'vendors' => Photographer::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.vendors.create', [
            'title' => "Fotografer",
            'route' => 'photographers'
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

        while (Photographer::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        Photographer::create(array_merge($validated, ['slug' => $slug]));

        return redirect()->route('photographers.index')
            ->with('success', 'Fotografer : ' . $validated['name'] . ' berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Photographer $photographer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photographer $photographer)
    {
        return view('dashboard.vendors.edit', [
            'title' => "Fotografer",
            'route' => 'photographers',
            'vendor' => $photographer
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Photographer $photographer)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:photographers,name,' . $photographer->slug . ',slug',
            'services' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
        ]);

        $photographer = Photographer::where('slug', $photographer->slug)->firstOrFail();

        // Jika nama berubah, generate slug baru
        if ($photographer->name !== $validated['name']) {
            $baseSlug = Str::slug($validated['name']);
            $newSlug = $baseSlug;
            $counter = 1;

            while (Photographer::where('slug', $newSlug)->where('id', '!=', $photographer->id)->exists()) {
                $newSlug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $validated['slug'] = $newSlug;
        }

        $photographer->update($validated);

        return redirect()->route('photographers.index')
            ->with('success', 'Fotografer : ' . $photographer->name . ' berhasil diperbarui!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photographer $photographer)
    {
        $photographer = Photographer::where('slug', $photographer->slug)->firstOrFail();
        $photographer->delete();

        return redirect()->route('photographers.index')
            ->with('success', 'Fotografer : ' . $photographer->name . ' berhasil dihapus!');
    }
}
