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
        Schema::create('chitietanpham', function (Blueprint $table) {
            $table->integer('mactanpham')->autoIncrement();
            $table->string('tenanpham', 100);
            $table->string('tacgia', 100)->nullable();
            $table->year('namxuatban')->nullable();
            $table->string('hinhanh', 100);
            $table->integer('madanhmuc'); // Thêm cột khóa ngoại
            
            // Khóa ngoại tham chiếu đến `madanhmuc` trong bảng `danhmuc`
            $table->foreign('madanhmuc')->references('madanhmuc')->on('danhmuc')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chitietanpham', function (Blueprint $table) {
            $table->dropForeign(['madanhmuc']);
        });

        Schema::dropIfExists('chitietanpham');
    }
};
