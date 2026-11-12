<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class ProductCreationTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_add_item_page_shows_product_fields(): void
    {
        $this->get(route('products.create'))
            ->assertOk()
            ->assertSee('Tambah Item')
            ->assertSee('name="nama_barang"', false)
            ->assertSee('name="harga"', false)
            ->assertSee('name="stok"', false)
            ->assertSee('name="deskripsi"', false);
    }

    public function test_valid_item_is_saved_and_redirects_to_catalog(): void
    {
        $this->post(route('products.store'), [
            'nama_barang' => 'Mawar Putih',
            'harga' => '73500.50',
            'stok' => '17',
            'deskripsi' => 'Mawar putih segar.',
        ])
            ->assertRedirect(route('products.index'))
            ->assertSessionHas('success', 'Item baru berhasil ditambahkan.');

        $this->assertDatabaseHas('products', [
            'nama_barang' => 'Mawar Putih',
            'harga' => '73500.50',
            'stok' => 17,
            'deskripsi' => 'Mawar putih segar.',
        ]);
    }

    public function test_invalid_item_is_not_saved_and_returns_validation_errors(): void
    {
        $this->from(route('products.create'))
            ->post(route('products.store'), [
                'nama_barang' => '',
                'harga' => '-1',
                'stok' => '-1',
            ])
            ->assertRedirect(route('products.create'))
            ->assertSessionHasErrors([
                'nama_barang' => 'Nama barang wajib diisi.',
                'harga' => 'Harga tidak boleh kurang dari 0.',
                'stok' => 'Stok tidak boleh kurang dari 0.',
            ]);

        $this->assertDatabaseCount('products', 0);
    }
}
