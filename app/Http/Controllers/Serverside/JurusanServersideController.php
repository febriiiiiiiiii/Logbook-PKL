<?php

namespace App\Http\Controllers\Serverside;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJurusanRequest;
use App\Http\Requests\UpdateJurusanRequest;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JurusanServersideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $jurusanserverside = Jurusan::query()->latest();
    
            return DataTables::of($jurusanserverside)
                ->addIndexColumn()
                ->addColumn('action', function ($jurusanserverside) {
                    return '
                        <a href="'.route('jurusanserverside.edit', $jurusanserverside->id).'" class="text-blue-600">Edit</a>
                        <form action="'.route('jurusanserverside.destroy', $jurusanserverside->id).'" method="POST" style="display:inline-block;" onsubmit="return confirm(\'Yakin akan menghapus data?\')">
                            '.csrf_field().method_field('DELETE').'
                            <button type="submit" class="text-red-600">Delete</button>
                        </form>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        
        return view('serverside.jurusanserverside');
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

        return redirect()->route('jurusanserverside.index')->with('success', 'berhasil membuat data jurusan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $jurusanserverside)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurusan $jurusanserverside)
    {
        return view('data.editjurusan', compact('jurusanserverside'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJurusanRequest $request, Jurusan $jurusanserverside)
    {
        $jurusanserverside->update($request->validated());

        return redirect()->route('jurusanserverside.index')->with('success', 'Bershasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurusan $jurusanserverside)
    {
        if ($jurusanserverside->jurusanSekolahs()->exists()) {
            return redirect()->back()->with('error', 'Data tidak dapat  dihapus');
        }

        $jurusanserverside->delete();
        
        return redirect()->route('jurusanserverside.index')->with('success', 'Berhasil menghapus data');
    }
}