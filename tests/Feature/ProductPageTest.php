<?php

namespace Tests\Feature;

use App\Models\Product;
use DateTimeImmutable;
use DateTimeZone;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class ProductPageTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_homepage_displays_numeric_stock_full_timestamp_and_products_by_id(): void
    {
        $this->travelTo(new DateTimeImmutable('2026-01-02 03:04:05', new DateTimeZone('Asia/Jakarta')));

        Product::query()->create([
            'nama_barang' => 'Mawar Merah',
            'harga' => 75000,
            'stok' => 24,
            'deskripsi' => 'Mawar merah segar untuk hadiah.',
        ]);

        Product::query()->create([
            'nama_barang' => 'Tulip',
            'harga' => 95000,
            'stok' => 12,
            'deskripsi' => 'Tulip pilihan.',
        ]);

        $this->get('/')
            ->assertOk()
            ->assertSee('Mawar Merah')
            ->assertSee('Tambah Item')
            ->assertSee('Rp 75.000')
            ->assertSee('24')
            ->assertDontSee('24 tersedia')
            ->assertSee('02-01-2026 | 03:04:05')
            ->assertSeeInOrder(['Mawar Merah', 'Tulip'])
            ->assertSee('Mawar merah segar untuk hadiah.');
    }

    public function test_application_and_mysql_connection_use_jakarta_timezone(): void
    {
        $this->assertSame('Asia/Jakarta', config('app.timezone'));
        $this->assertSame('+07:00', config('database.connections.mysql.timezone'));
    }
}
