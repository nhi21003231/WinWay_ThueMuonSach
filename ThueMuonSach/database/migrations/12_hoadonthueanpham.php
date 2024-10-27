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
        Schema::create('hoadonthueanpham', function (Blueprint $table) {
            $table->integer('mahoadon')->autoIncrement();
            $table->date('ngaythue');
            $table->date('ngaytra');
            $table->decimal('phitracham', 10, 2);
            $table->date('ngaythanhtoan');
            $table->enum('phuongthucthanhtoan', ['Tiền mặt', 'Chuyển khoản']);
            $table->enum('loaidon', ['Đặt trước', 'Đơn thuê']);
            $table->enum('trangthai', ['Đang thuê', 'Đã trả']);
            $table->integer('manhanvien'); // Thêm cột khóa ngoại
            
            $table->foreign('manhanvien')->references('manhanvien')->on('nhanvien')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hoadonthueanpham', function (Blueprint $table) {
            $table->dropForeign(['manhanvien']);
        });
        
        Schema::dropIfExists('hoadonthueanpham');
    }
};
