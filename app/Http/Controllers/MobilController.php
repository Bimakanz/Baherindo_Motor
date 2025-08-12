<?php

namespace App\Http\Controllers;

use App\Models\MobilBaherindo;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mobil.creates');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'nama_mobil' => 'required|string',
            'harga_mobil' => 'required|numeric',
            'km_mobil' => 'required|integer',
            'tahun_mobil' => 'required|integer',
            'gambar_mobil' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('gambar_mobil')) {
            $path = $request->file('gambar_mobil')->store('mobil_images', 'public');
            $validatedData['gambar_mobil'] = $path;
        }

        MobilBaherindo::create($validatedData);
        return redirect('mobeel');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mobil = MobilBaherindo::findOrFail($id);
        return view('mobil.show', compact('mobil'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mobil = MobilBaherindo::findOrFail($id);
        return view('mobil.edit', compact('mobil'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $mobil = MobilBaherindo::findOrFail($id);

         // Validate the request data
         $validatedData = $request->validate([
            'nama_mobil' => 'required|string',
            'harga_mobil' => 'required|numeric',
            'km_mobil' => 'required|integer',
            'tahun_mobil' => 'required|integer',
            'gambar_mobil' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $mobil = MobilBaherindo::findOrFail($id);
        if ($request->hasFile('gambar_mobil')) {
            $path = $request->file('gambar_mobil')->store('mobil_images', 'public');
            $validatedData['gambar_mobil'] = $path;
        }

        $mobil->update($validatedData);
        return redirect('/mobeel');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mobil = MobilBaherindo::findOrFail($id);
        $mobil->delete();
        return redirect('mobeel')->with('success', 'Mobil deleted successfully');
    }
}
