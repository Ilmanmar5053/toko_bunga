<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $timezone = new DateTimeZone('Asia/Jakarta');

        DB::table('products')->orderBy('id')->chunkById(500, function (Collection $products) use ($timezone): void {
            foreach ($products as $product) {
                $timestamps = [];

                foreach (['created_at', 'updated_at'] as $column) {
                    if ($product->{$column} !== null) {
                        $timestamps[$column] = (new DateTimeImmutable($product->{$column}, $timezone))
                            ->modify('+7 hours')
                            ->format('Y-m-d H:i:s');
                    }
                }

                if ($timestamps !== []) {
                    DB::table('products')
                        ->where('id', $product->id)
                        ->update($timestamps);
                }
            }
        });
    }

    public function down(): void
    {
        throw new RuntimeException('Product timestamp correction cannot be reversed safely after new records are created.');
    }
};
