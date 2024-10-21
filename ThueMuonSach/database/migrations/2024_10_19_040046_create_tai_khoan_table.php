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
            $table->integer('id')->autoIncrement();
            $table->string('ten_tai_khoan',50)->unique(); 
            $table->string('mat_khau'); 
            $table->enum('vai_tro', ['khachhang', 'nhanvien', 'quanlycuahang', 'quanlykho'])->default('khachhang');
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
