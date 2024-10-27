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
        Schema::create('chuongtrinhkhuyenmai', function (Blueprint $table) {
            $table->integer('mactkm')->autoIncrement();
            $table->string('tenchuongtrinhkm', 100);
            $table->string('mota', 1000);
            $table->date('ngayapdung');
            $table->date('ngayketthuc');
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
        Schema::table('chuongtrinhkhuyenmai', function (Blueprint $table) {
            $table->dropForeign(['manhanvien']);
        });

        Schema::dropIfExists('chuongtrinhkhuyenmai');
    }
};
