<?php

namespace App\Http\Controllers;

use App\Models\Decoration;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DecorationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.vendors.index', [
            'title' => "Dekorasi",
            'route' => 'decorations',
            'vendors' => Decoration::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.vendors.create', [
            'title' => "Dekorasi",
            'route' => 'decorations',
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

        while (Decoration::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        Decoration::create(array_merge($validated, ['slug' => $slug]));

        return redirect()->route('decorations.index')
            ->with('success', 'Dekorasi : ' . $validated['name'] . ' berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Decoration $decoration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Decoration $decoration)
    {
        return view('dashboard.vendors.edit', [
            'title' => "Dekorasi",
            'route' => 'decorations',
            'vendor' => $decoration
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Decoration $decoration)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:photographers,name,' . $decoration->slug . ',slug',
            'services' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
        ]);

        $decoration = Decoration::where('slug', $decoration->slug)->firstOrFail();

        // Jika nama berubah, generate slug baru
        if ($decoration->name !== $validated['name']) {
            $baseSlug = Str::slug($validated['name']);
            $newSlug = $baseSlug;
            $counter = 1;

            while (Decoration::where('slug', $newSlug)->where('id', '!=', $decoration->id)->exists()) {
                $newSlug = $baseSlug . '-' . $counter;
                $counter++;
            }

            $validated['slug'] = $newSlug;
        }

        $decoration->update($validated);

        return redirect()->route('decorations.index')
            ->with('success', 'Dekorasi : ' . $decoration->name . ' berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Decoration $decoration)
    {
        $decoration = Decoration::where('slug', $decoration->slug)->firstOrFail();
        $decoration->delete();

        return redirect()->route('decorations.index')
            ->with('success', 'Fotografer : ' . $decoration->name . ' berhasil dihapus!');
    }
}
