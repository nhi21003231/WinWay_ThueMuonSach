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
        Schema::create('baibao', function (Blueprint $table) {
            $table->integer('mabaibao')->autoIncrement();
            $table->string('tieude', 100);
<<<<<<< HEAD
            // 30/10 đổi noidung từ string thành text
            $table->text('noidung');
=======
            $table->string('noidung',255);
>>>>>>> d13b4fe9e3f8639db3512ee4eb66866c0781b10f
            $table->date('ngaydang');
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
        Schema::table('baibao', function (Blueprint $table) {
            $table->dropForeign(['manhanvien']);
        });

        Schema::dropIfExists('baibao');
    }
};
