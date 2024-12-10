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
            $table->date('ngaytra')->nullable();
            $table->decimal('phitracham', 10, 2);
            $table->decimal('thanhtien', 10, 2)->nullable();
            $table->date('ngaythanhtoan');
            $table->enum('phuongthucthanhtoan', ['Momo', 'Chuyển khoản']);
            $table->string('mathamchieu', 100)->nullable();
            $table->enum('loaidon', ['Đặt trước', 'Đơn thuê']);
            $table->enum('trangthai', ['Đang xử lý','Đang chờ sách','Đã có sách', 'Đang thuê', 'Đã trả']); 
            $table->integer('soluongthue')->nullable();
            $table->integer('manhanvien')->nullable(); // Thêm cột khóa ngoại
            $table->integer('makhachhang'); // Thêm cột khóa ngoại
            $table->integer('mactanpham')->nullable();

            $table->foreign('manhanvien')->references('manhanvien')->on('nhanvien')->onDelete('cascade');
            $table->foreign('makhachhang')->references('makhachhang')->on('khachhang')->onDelete('cascade');
            $table->foreign('mactanpham')->references('mactanpham')->on('chitietanpham')->onDelete('cascade');

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
            $table->dropForeign(['makhachhang']);
            $table->dropForeign(['mactanpham']);
        });
        
        Schema::dropIfExists('hoadonthueanpham');
    }
};
