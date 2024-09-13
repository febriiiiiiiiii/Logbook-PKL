<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePembimbingLapanganRequest;
use App\Http\Requests\UpdatePembimbingLapanganRequest;
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
    public function store(StorePembimbingLapanganRequest $request)
    {
        PembimbingLapangan::crete($request->validated());

        return redirect()->route('pembimbingLapangan.index');
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
    public function edit(PembimbingLapangan $pembimbingLapangan)
    {
        return view('editPembimbingLapangan', compact('pembimbingLapangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePembimbingLapanganRequest $request, PembimbingLapangan $pembimbingLapangan)
    {
        $pembimbingLapangan->update($request->validated());

        return redirect()->route('pembimbingLapangan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PembimbingLapangan $pembimbingLapangan)
    {
        $pembimbingLapangan->delete();

        return redirect()->route('pembimbingLapangan.index');
    }
}
