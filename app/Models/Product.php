<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['nama_barang', 'harga', 'stok', 'deskripsi'])]
class Product extends Model {}
