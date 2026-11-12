<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function create(): View
    {
        return view('products.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama_barang' => ['required', 'string', 'max:255'],
            'harga' => ['required', 'numeric', 'decimal:0,2', 'min:0', 'max:9999999999.99'],
            'stok' => ['required', 'integer', 'min:0', 'max:4294967295'],
            'deskripsi' => ['nullable', 'string'],
        ], [
            'nama_barang.required' => 'Nama barang wajib diisi.',
            'nama_barang.string' => 'Nama barang harus berupa teks.',
            'nama_barang.max' => 'Nama barang maksimal 255 karakter.',
            'harga.required' => 'Harga wajib diisi.',
            'harga.numeric' => 'Harga harus berupa angka.',
            'harga.decimal' => 'Harga hanya boleh memiliki maksimal 2 angka desimal.',
            'harga.min' => 'Harga tidak boleh kurang dari 0.',
            'harga.max' => 'Harga tidak boleh melebihi Rp 9.999.999.999,99.',
            'stok.required' => 'Stok wajib diisi.',
            'stok.integer' => 'Stok harus berupa bilangan bulat.',
            'stok.min' => 'Stok tidak boleh kurang dari 0.',
            'stok.max' => 'Stok melebihi batas maksimum.',
            'deskripsi.string' => 'Deskripsi harus berupa teks.',
        ]);

        Product::query()->create($validated);

        return redirect()
            ->route('products.index')
            ->with('success', 'Item baru berhasil ditambahkan.');
    }
}
