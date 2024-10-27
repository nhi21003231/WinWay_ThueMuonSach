<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('danhgia', function (Blueprint $table) {
            $table->integer('madanhgia')->autoIncrement();
            $table->string('binhluan', 1000);
            $table->boolean('trangthai')->default(true);
            $table->integer('sosao');
            $table->integer('maanpham');
            $table->integer('makhachhang');

            $table->foreign('maanpham')->references('maanpham')->on('ds_anpham')->onDelete('cascade');

            $table->foreign('makhachhang')->references('makhachhang')->on('khachhang')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('danhgia', function (Blueprint $table) {
            $table->dropForeign(['maanpham']);
            $table->dropForeign(['makhachhang']);
        });

        Schema::dropIfExists('danhgia');
    }
};
