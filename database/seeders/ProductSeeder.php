<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'nama_barang' => 'Mawar Merah',
                'harga' => 75000,
                'stok' => 24,
                'deskripsi' => 'Mawar merah segar, cocok untuk hadiah penuh makna.',
            ],
            [
                'nama_barang' => 'Tulip',
                'harga' => 95000,
                'stok' => 12,
                'deskripsi' => 'Tulip pilihan dengan warna cerah dan elegan.',
            ],
            [
                'nama_barang' => 'Lily Putih',
                'harga' => 85000,
                'stok' => 8,
                'deskripsi' => 'Lily putih harum untuk mempercantik ruangan.',
            ],
            [
                'nama_barang' => 'Anggrek Bulan',
                'harga' => 125000,
                'stok' => 6,
                'deskripsi' => 'Anggrek bulan dalam pot, cantik dan tahan lama.',
            ],
            [
                'nama_barang' => 'Buket Bunga Matahari',
                'harga' => 150000,
                'stok' => 4,
                'deskripsi' => 'Buket ceria berisi bunga matahari segar.',
            ],
        ];

        foreach ($products as $product) {
            Product::query()->updateOrCreate(
                ['nama_barang' => $product['nama_barang']],
                $product,
            );
        }
    }
}
