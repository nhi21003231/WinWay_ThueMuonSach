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
        Schema::create('khachhang', function (Blueprint $table) {
            $table->integer('makhachhang')->autoIncrement();
            $table->string('hoten',50);
            $table->string('email',50);
            $table->string('dienthoai',50);
            $table->string('diachi',255)->nullable();
            $table->boolean('lathanhvien')->default(false);
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
        
        Schema::table('khachhang', function (Blueprint $table) {
            $table->dropForeign(['mataikhoan']);
        });

        Schema::dropIfExists('khachhang');
    }
};
