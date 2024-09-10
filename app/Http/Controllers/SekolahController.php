<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sekolahs = Sekolah::orderBy('created_at', 'desc')->paginate(10);

        return view('sekolah', compact('sekolahs'));
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
        $validate = $request->validate([
            'nama' => 'required|string|min:3|max:100',
            'alamat' => 'required|string|min:3|max:200',
            'email' => 'required|string||min:3|max:100',
            'telephone' => 'required|string|min:3|max:20',
        ]);

        Sekolah::create($validate);

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
    public function edit(string $id)
    {
        $sekolah=Sekolah::query()->findOrFail($id);

        return view('editsekolah', compact('sekolah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sekolah = Sekolah::query()->findOrFail($id);

        $validate= $request->validate([
            'nama' => 'required|string|min:3|max:100',
            'alamat' => 'required|string|min:3|max:200',
            'email' => 'required|email|min:3|max:100',
            'telephone' => 'required|string|min:3|max:20',
        ]);

        $sekolah->update($validate);

        return redirect()->route('sekolah.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sekolah = Sekolah::query()->find($id);

        if ($sekolah->jurusanSekolahs()->exists()) {
            return redirect()->back()->with('error', 'Tidak dapat menghapus data karena terdapat relasi dengan data lain.');
        }

        $sekolah->delete();
    
        return redirect()->route('sekolah.index')->with('success', 'Data berhasil dihapus.');
    }
}
