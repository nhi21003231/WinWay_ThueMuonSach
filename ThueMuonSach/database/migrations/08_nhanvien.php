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
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->integer('manhanvien')->autoIncrement();
            $table->string('hoten', 100);
            $table->string('sodienthoai', 100);
            $table->string('email', 100);
            $table->integer('mataikhoan'); // Thêm cột khóa ngoại
            
            $table->foreign('mataikhoan')->references('mataikhoan')->on('taikhoan')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nhanvien', function (Blueprint $table) {
            $table->dropForeign(['mataikhoan']);
        });

        Schema::dropIfExists('nhanvien');
    }
};
