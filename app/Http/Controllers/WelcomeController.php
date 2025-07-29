<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motor = [
            ['id' => 1, 'name' => 'Motor Yamaha', 'tahun' => 2020, 'km' => 20000, 'price' => 1000000],
            ['id' => 2, 'name' => 'Motor Honda', 'tahun' => 2021, 'km' => 15000, 'price' => 1200000],
            ['id' => 3, 'name' => 'Motor Suzuki', 'tahun' => 2019, 'km' => 30000, 'price' => 800000],
            ['id' => 4, 'name' => 'Motor Kawasaki', 'tahun' => 2022, 'km' => 5000, 'price' => 1500000],
            ['id' => 5, 'name' => 'Motor KTM', 'tahun' => 2023, 'km' => 1000, 'price' => 2000000],
            ['id' => 6, 'name' => 'Motor Vespa', 'tahun' => 2020, 'km' => 25000, 'price' => 900000],
            ['id' => 7, 'name' => 'Motor BMW', 'tahun' => 2021, 'km' => 12000, 'price' => 2500000],
            ['id' => 8, 'name' => 'Motor Ducati', 'tahun' => 2022, 'km' => 8000, 'price' => 3000000],
        ];
        return view('welcome', compact('motor'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
