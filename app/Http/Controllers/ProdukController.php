<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        //get all products
        $produk = Produk::latest()->paginate(10);

        //render view with products
        return view('produk.index', compact('produk')); //data produk bisa diakses di view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama_produk'  => 'required|min:3',
            'kategori'     => 'required|min:3',
            'harga'        => 'required|numeric',
            'stok'         => 'required|numeric',
            'deskripsi'    => 'required|min:5'
        ]);

        //create product
        Produk::create([
            'nama_produk'   => $request->nama_produk,
            'kategori'      => $request->kategori,
            'harga'         => $request->harga,
            'stok'          => $request->stok,
            'deskripsi'     => $request->deskripsi
        ]);

        //redirect to index
        return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $produk = Produk::findOrFail($id);

        return view('produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $produk = Produk::findOrFail($id);

        return view('produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama_produk'  => 'required|min:3',
            'kategori'     => 'required|min:3',
            'harga'        => 'required|numeric',
            'stok'         => 'required|numeric',
            'deskripsi'    => 'required|min:5'
        ]);

        //get product by ID
        $produk = Produk::findOrFail($id);

        //update product
        $produk->update([
            'nama_produk'   => $request->nama_produk,
            'kategori'      => $request->kategori,
            'harga'         => $request->harga,
            'stok'          => $request->stok,
            'deskripsi'     => $request->deskripsi
        ]);

        //redirect to index
        return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        //get product by ID
        $produk = Produk::findOrFail($id);

        //delete product
        $produk->delete();

        //redirect to index
        return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
