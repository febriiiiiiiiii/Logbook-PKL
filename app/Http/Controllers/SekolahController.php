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
        $sekolahs = Sekolah::all();

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
        $request->validate([
            'nama' => 'required|string|min:3|max:100',
            'alamat' => 'required|string|min:3|max:200',
            'email' => 'required|string||min:3|max:100',
            'telephone' => 'required|string|min:3|max:20',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.min' => 'Nama minimal terdiri dari 3 karakter.',
            'nama.max' => 'Nama maksimal terdiri dari 100 karakter.',
        
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.min' => 'Alamat minimal terdiri dari 3 karakter.',
            'alamat.max' => 'Alamat maksimal terdiri dari 200 karakter.',
        
            'email.required' => 'Email wajib diisi.',
            'email.min' => 'Email minimal terdiri dari 3 karakter.',
            'email.max' => 'Email maksimal terdiri dari 100 karakter.',
        
            'telephone.required' => 'Telepon wajib diisi.',
            'telephone.min' => 'Telepon minimal terdiri dari 3 karakter.',
            'telephone.max' => 'Telepon maksimal terdiri dari 20 karakter.',
        ]);

        $sekolah = [
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'email' => $request->input('email'),
            'telephone' => $request->input('telephone'),
        ];

        Sekolah::create($sekolah);

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
        $request->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string|max:200',
            'email' => 'required|email|max:100',
            'telephone' => 'required|string|max:20',
        ]);

        $sekolah = [
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
            'email' => $request->input('email'),
            'telephone' => $request->input('telephone'),
        ];

        Sekolah::query()->where('id', $id)->update($sekolah);

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

        Sekolah::query()->where('id', $id)->delete();
    
        return redirect()->route('sekolah.index')->with('success', 'Data berhasil dihapus.');
    }
}
