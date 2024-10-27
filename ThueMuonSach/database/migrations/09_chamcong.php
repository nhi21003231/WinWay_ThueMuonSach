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
            $table->integer('machamcong')->autoIncrement();
            $table->boolean('ghinhan')->default(false);
            $table->dateTime('thoigianvao');
            $table->dateTime('thoigianra');

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
        Schema::table('chamcong', function (Blueprint $table) {
            $table->dropForeign(['manhanvien']);
        });

        Schema::dropIfExists('chamcong');
    }
};
