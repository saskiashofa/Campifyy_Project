<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(request $request)
    {
        $keyword = $request->get('keyword');
        $produk = Produk::with('kategori')
                ->when($keyword, function($query, $keyword) {
                    $query->where('nama', 'like', "%$keyword%")
                          ->orWhere('deskripsi', 'like', "%$keyword%");
                })
                ->get();
        return view("admin.produkadmin", compact("produk"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.tambahproduk', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([
        'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        'nama' => 'required',
        'deskripsi' => 'required',
        'harga_day' => 'required|numeric',
        'stok' => 'required|numeric',
        'id_ktg' => 'required',
    ]);

    $file = $request->file('gambar');
    $filename = time() . '_' . $file->getClientOriginalName();
    $file->move(public_path('uploads/produk'), $filename);

    Produk::create([
        'gambar' => $filename,
        'nama' => $request->nama,
        'deskripsi' => $request->deskripsi,
        'harga_day' => $request->harga_day,
        'stok' => $request->stok,
        'id_ktg' => $request->id_ktg,
    ]);

    return redirect('/admin/produk')
        ->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function showProducts(Request $request)
    {
        // Mulai query Produk dengan relasi kategori
        $query = Produk::with('kategori');

        // Filter keyword search
        if ($request->has('keyword') && $request->keyword != '') {
            $query->where('nama', 'like', '%' . $request->keyword . '%');
        }

        // Filter kategori
        if ($request->has('kategori') && $request->kategori != '') {
            $query->where('id_ktg', $request->kategori);
        }

        // Ambil hasil query
        $products = $query->get();

        // Ambil semua kategori untuk dropdown
        $kategoris = Kategori::all();

        // Kirim ke view
        return view('user.products', compact('products', 'kategoris'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        return view('/admin/editproduk', compact('produk', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga_day' => 'required|numeric',
            'stok' => 'required|numeric',
            'id_ktg' => 'required',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $produk = Produk::findOrFail($id);

        if ($request->hasFile('gambar')) {
            // Hapus file lama jika ada
            $oldFile = public_path('uploads/produk/' . $produk->gambar);
            if (file_exists($oldFile) && is_file($oldFile)) {
                unlink($oldFile);
            }

            // Upload gambar baru
            $file = $request->file('gambar');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/produk'), $filename);
            $produk->gambar = $filename;
        }

        $produk->nama = $request->nama;
        $produk->deskripsi = $request->deskripsi;
        $produk->harga_day = $request->harga_day;
        $produk->stok = $request->stok;
        $produk->id_ktg = $request->id_ktg;

        $produk->save();

        return redirect('/admin/produk')
            ->with('success', 'Produk berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $filePath = public_path('uploads/produk/' . $produk->gambar);
        if (file_exists($filePath) && is_file($filePath)) {
        unlink($filePath);
        }
        $produk->delete();
        return redirect('/admin/produk')->with('success', 'produk berhasil
        dihapus!');
    }

    public function showUserProducts()
    {
        $products = Produk::with('kategori')->latest()->take(3)->get();
        return view('user.home', compact('products')); // kirim ke homepage
    }

}
