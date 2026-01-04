<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        $keyword = $request->get('keyword');
        $kategori = Kategori::when($keyword, function($query, $keyword) {
            $query->where('nama_ktg', 'like', "%$keyword%");
        })->get();
        return view('admin.kategori', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tambahkategori');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'nama_ktg' => 'required'
        ]);

        Kategori::create([
            'nama_ktg' => $request->nama_ktg
        ]);

        return redirect('/admin/kategori')->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.editkategori', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_ktg' => 'required'
        ]);

        $kategori = Kategori::findOrFail($id);
        $kategori->nama_ktg = $request->nama_ktg;
        $kategori->save();

        return redirect('/admin/kategori')->with('success', 'Kategori berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect('/admin/kategori')->with('success', 'Kategori berhasil dihapus');  
    }
}
