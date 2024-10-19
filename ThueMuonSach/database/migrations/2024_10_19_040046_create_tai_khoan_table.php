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
        Schema::create('tai_khoan', function (Blueprint $table) {
            $table->id();
            $table->string('ten_tai_khoan')->unique(); // Tên tài khoản duy nhất
            $table->string('mat_khau'); // Mật khẩu (hashed)
            $table->enum('vai_tro', ['khachhang', 'nhanvien', 'quanlycuahang', 'quanlykho'])->default('khachhang'); // Các vai trò
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tai_khoan');
    }
};
