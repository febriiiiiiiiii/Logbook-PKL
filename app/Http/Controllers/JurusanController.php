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
        $jurusans = Jurusan::orderBy('created_at', 'desc')->paginate(20);

        return view('data.jurusan', compact('jurusans'));
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
    public function edit(string $id)
    {
        $jurusan = Jurusan::query()->findOrFail($id);

        return view('data.editjurusan', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJurusanRequest $request, string $id)
    {

        $jurusan = Jurusan::query()->findOrFail($id);

        $jurusan->update($request->validated());

        return redirect()->route('jurusan.index')->with('success', 'Bershasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jurusan = Jurusan::query()->find($id);

        if ($jurusan->jurusanSekolahs()->exists()) {
            return redirect()->back()->with('error', 'Data tidak dapat  dihapus');
        }

        $jurusan->delete();
        
        return redirect()->route('jurusan.index')->with('success', 'Berhasil menghapus data');
    }
}
