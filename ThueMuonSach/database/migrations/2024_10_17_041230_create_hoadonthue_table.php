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
        Schema::create('hoadonthue', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->date('NgayThue');
            $table->string('LoaiDon')->default('Đơn thuê');
            $table->integer('id_khachhang')->nullable();
            $table->integer('id_anpham')->nullable();
            $table->foreign('id_khachhang')->references('id')->on('khachhang')->onDelete('cascade');
            $table->foreign('id_anpham')->references('id')->on('anpham')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hoadonthue');
        Schema::table('hoadonthue',function($table){
            $table->dropForeign('id_khachhang');
            $table->dropForeign('id_anpham');
        });
    }
};
