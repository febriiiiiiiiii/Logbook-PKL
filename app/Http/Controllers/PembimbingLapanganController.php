<?php

namespace App\Http\Controllers;

use App\Models\PembimbingLapangan;
use Illuminate\Http\Request;

class PembimbingLapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembimbingLapangans = PembimbingLapangan::all();
        return view('pembimbinglapangan', compact('pembimbingLapangans'));
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
