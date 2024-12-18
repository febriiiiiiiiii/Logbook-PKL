<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAngkatanRequest;
use App\Http\Requests\UpdateAngkatanRequest;
use App\Models\Angkatan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AngkatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (!$request->ajax()){
            return view('angkatan.angkatan');
        }

        $angkatan = Angkatan::query()->latest();

        return DataTables::of($angkatan)
            ->addIndexColumn()
            ->addColumn('action', function ($angkatan){
                return view('angkatan.action_buttons', compact('angkatan'))->render();
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
    public function store(StoreAngkatanRequest $request)
    {
        Angkatan::create($request->validated());

        return redirect()->route('angkatan.index')->with('succes', 'Berhasil menambahkan data angkatan.');
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
    public function edit(Angkatan $angkatan)
    {
        return view('angkatan.edit_angkatan', compact('angkatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAngkatanRequest $request, Angkatan $angkatan)
    {
        $angkatan->update($request->validated());

        return redirect()->route('angkatan.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Angkatan $angkatan)
    {
        if(!auth()->user()->can('hapus-angkatan')){
            return redirect()->route('angkatan.index')->with('error', 'Anda tidak memiliki izin untuk menghapus data angkatan.');
        }

        if($angkatan->siswas()->exists()){
            return redirect()->back()->with('error', 'Data tidak dapat dihapus.');
        }

        $angkatan->delete();
        return redirect()->route('angkatan.index')->with('succes', 'Data berhasil dihapus.');
    }
}
