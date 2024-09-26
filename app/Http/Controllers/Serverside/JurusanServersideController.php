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
            $jurusans = Jurusan::query()->latest();
    
            return DataTables::of($jurusans)
                ->addIndexColumn()
                ->addColumn('action', function ($jurusan) {
                    return '
                        <a href="'.route('jurusan.edit', $jurusan->id).'" class="text-blue-600">Edit</a>
                        <form action="'.route('jurusan.destroy', $jurusan->id).'" method="POST" style="display:inline-block;" onsubmit="return confirm(\'Yakin akan menghapus data?\')">
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurusan $id)
    {
        return view('data.editjurusan', compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJurusanRequest $request, Jurusan $id)
    {
        $id->update($request->validated());

        return redirect()->route('jurusanserverside.index')->with('success', 'Bershasil Update Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurusan $id)
    {
        if ($id->jurusanSekolahs()->exists()) {
            return redirect()->back()->with('error', 'Data tidak dapat  dihapus');
        }

        $id->delete();
        
        return redirect()->route('jurusanserverside.index')->with('success', 'Berhasil menghapus data');
    }
}
