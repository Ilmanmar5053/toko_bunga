<?php

namespace Tests\Feature;

use App\Models\Product;
use Database\Seeders\ProductSeeder;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class ProductSeederTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_product_seeder_creates_five_florist_products_without_duplicates(): void
    {
        $this->seed(ProductSeeder::class);
        $this->seed(ProductSeeder::class);

        $this->assertDatabaseCount('products', 5);
        $this->assertSame(
            [
                'Anggrek Bulan',
                'Buket Bunga Matahari',
                'Lily Putih',
                'Mawar Merah',
                'Tulip',
            ],
            Product::query()->orderBy('nama_barang')->pluck('nama_barang')->all(),
        );
    }
}
