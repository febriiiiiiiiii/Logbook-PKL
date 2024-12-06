<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJurusanRequest;
use App\Http\Requests\UpdateJurusanRequest;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_if(!auth()->user()->can('lihat-jurusan'), 403);

        $jurusans = Jurusan::query()->latest()->get();

        return view('jurusan.jurusan', compact('jurusans'));
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
    public function store(StoreJurusanRequest $request)
    {
        abort_if(!auth()->user()->can('tambah-jurusan'), 403);

        Jurusan::create($request->validated());

        return redirect()->route('jurusan.index')->with('success', 'berhasil membuat data jurusan');
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
    public function edit(Jurusan $jurusan)
    {
        abort_if(!auth()->user()->can('edit-jurusan'), 403);

        return view('jurusan.editjurusan', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJurusanRequest $request, Jurusan $jurusan)
    {
        abort_if(!auth()->user()->can('edit-jurusan'), 403);

        $jurusan->update($request->validated());

        return redirect()->route('jurusan.index')->with('success', 'Bershasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurusan $jurusan)
    {
        abort_if(!auth()->user()->can('hapus-jurusan'), 403);

        if ($jurusan->jurusanSekolahs()->exists()) {
            return redirect()->back()->with('error', 'Data tidak dapat  dihapus');
        }

        $jurusan->delete();
        
        return redirect()->route('jurusan.index')->with('success', 'Berhasil menghapus data');
    }
}
