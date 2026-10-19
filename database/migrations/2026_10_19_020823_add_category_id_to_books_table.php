<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Membuat category_id boleh kosong
        DB::statement('ALTER TABLE books MODIFY category_id BIGINT UNSIGNED NULL');

        // Buku lama belum memiliki kategori
        DB::table('books')->update([
            'category_id' => null
        ]);

        // Membuat relasi foreign key
        Schema::table('books', function (Blueprint $table) {
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
        });
    }
};