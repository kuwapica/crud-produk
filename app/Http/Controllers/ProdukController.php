<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// mengambil data dari tabel produk
use App\Models\Produk;
use Illuminate\View\View;

//import return type redirectResponse
use Illuminate\Http\RedirectResponse;

class ProdukController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(): View
    {
        //get all products
        $produk = Produk::latest()->paginate(10);

        //render view with products
        return view('produk.index', compact('produk')); //data produk bisa diakses di view
    }

    public function create(): View
    {
        return view('produk.create');
    }

    public function store(Request $request): RedirectResponse
    {

        //validate form
        $request->validate([
            'nama_produk'         => 'required|min:3',
            'kategori'         => 'required|min:3',
            'harga'         => 'required|numeric',
            'stok'         => 'required|numeric',
            'deskripsi'   => 'required|min:5'
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

    public function show(string $id)
    {
        $produk = Produk::findOrFail($id);

        return view('produk.show', compact('produk'));
    }

    /**
     * edit
     *
     * @param  mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        $produk = Produk::findOrFail($id);

        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, $id): RedirectResponse
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

    public function destroy($id): RedirectResponse
    {
        //get product by ID
        $produk = Produk::findOrFail($id);

        //delete product
        $produk->delete();

        //redirect to index
        return redirect()->route('produk.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
