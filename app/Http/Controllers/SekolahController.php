<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSekolahRequest;
use App\Http\Requests\UpdateSekolahRequest;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!$request->ajax()) {
            return view('sekolah');
        }

        $sekolah = Sekolah::query()->latest();

        return DataTables::of($sekolah)
            ->addIndexColumn()
            ->addColumn('action', function ($sekolah) {
                return view('sekolah.action_buttons', compact('sekolah'))->render();
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
    public function store(StoreSekolahRequest $request)
    {
        Sekolah::create($request->validated());

        return redirect()->route('sekolah.index')->with('success', 'Berhasil menambahkan data baru.');
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
    public function edit(Sekolah $sekolah)
    {
        return view('editsekolah', compact('sekolah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSekolahRequest $request, Sekolah $sekolah)
    {
        $sekolah->update($request->validated());
        
        return redirect()->route('sekolah.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sekolah $sekolah)
    {
        if (!auth()->user()->can('hapus-jurusan')) {
            return redirect()->route('sekolah.index')->with('error', 'Anda tidak memiliki izin untuk menghapus data sekolah.');
        }

        if ($sekolah->jurusanSekolahs()->exists()) {
            return redirect()->back()->with('error', 'Tidak dapat menghapus data karena terdapat relasi dengan data lain.');
        }

        $sekolah->delete();
        return redirect()->route('sekolah.index')->with('success', 'Data berhasil dihapus.');
    }

}
