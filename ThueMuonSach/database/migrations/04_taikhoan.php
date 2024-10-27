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
        Schema::create('taikhoan', function (Blueprint $table) {
            $table->integer('mataikhoan')->autoIncrement();
            $table->string('tentaikhoan', 100)->unique();
            $table->string('matkhau');
            $table->enum('vaitro', ['admin', 'quanlykho', 'nhanvien', 'quanlycuahang', 'khachhang'])->default('khachhang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taikhoan');
    }
};
