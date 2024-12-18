<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePembimbingLapanganRequest;
use App\Http\Requests\UpdatePembimbingLapanganRequest;
use App\Models\PembimbingLapangan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PembimbingLapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!$request->ajax()) {
            return view('pembimbing_lapangan.pembimbing_lapangan');
        }

        $pembimbingLapangan = PembimbingLapangan::query()->latest();

        return DataTables::of($pembimbingLapangan)
            ->addIndexColumn()
            ->addColumn('action', function ($pembimbingLapangan) {
                return view('pembimbing_lapangan.action_buttons', compact('pembimbingLapangan'))->render();
            })
            ->rawColumns(['action'])
            ->make(true);
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

        return redirect()->route('pembimbing_lapangan.index');
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
        return view('pembimbing_lapangan.edit_pembimbing_lapangan', compact('pembimbingLapangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePembimbingLapanganRequest $request, PembimbingLapangan $pembimbingLapangan)
    {
        $pembimbingLapangan->update($request->validated());

        return redirect()->route('pembimbing_lapangan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PembimbingLapangan $pembimbingLapangan)
    {
        $pembimbingLapangan->delete();

        return redirect()->route('pembimbing_lapangan.index');
    }
}
