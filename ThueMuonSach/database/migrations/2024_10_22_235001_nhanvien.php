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
        //
        Schema::create('nhanvien', function (Blueprint $table) {
            $table->increments('maNhanVien'); // khóa chính, tự tăng
            $table->string('hoTen', 50);
            $table->string('soDienThoai', 50);
            $table->string('email', 50);
            $table->enum('chucVu', ['Quản lý cửa hàng', 'Quản lý kho', 'Thuê trả']);
            $table->dateTime('ngayBoNhiem');
            $table->double('phuCap');
            // $table->foreign('maTaiKhoan')->references('maTaiKhoan')->on('taikhoan')->onDelete('cascade');
            $table->timestamps(); // Thêm các cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhanvien');
    }
};
