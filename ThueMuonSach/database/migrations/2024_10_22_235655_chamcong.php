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
        Schema::create('chamcong', function (Blueprint $table) {
            $table->increments('maChamCong'); // Khóa chính, tự động tăng
            $table->dateTime('thoiGianVao')->nullable();
            $table->dateTime('thoiGianRa')->nullable(); // Có thể để trống nếu chưa có thời gian ra
            $table->enum('ghiNhan', ['Có mặt', 'Vắng mặt'])->nullable();
            $table->unsignedInteger('maNhanVien'); // Khóa ngoại đến bảng nhân viên

            // Khóa ngoại tham chiếu đến bảng nhân viên
            $table->foreign('maNhanVien')->references('maNhanVien')->on('nhanvien')->onDelete('cascade');

            $table->timestamps(); // Thêm các cột created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chamcong');
    }
};
