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
        Schema::create('ds_anpham', function (Blueprint $table) {
            $table->integer('maanpham')->autoIncrement();
            $table->enum('tinhtrang', ['Mới', 'Cũ', 'Hư hỏng'])->default('Mới');
            $table->decimal('giathue', 10, 2);
            $table->decimal('giacoc', 10, 2);
            $table->string('vitri', 100);
            $table->boolean('dathue')->default(false);
            $table->boolean('dathanhly')->default(false);
            $table->integer('mactanpham'); // Thêm cột khóa ngoại

            // Khóa ngoại tham chiếu đến `mactanpham` trong bảng `danhmuc`
            $table->foreign('mactanpham')->references('mactanpham')->on('chitietanpham')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ds_anpham', function (Blueprint $table) {
            $table->dropForeign(['mactanpham']);
        });

        Schema::dropIfExists('ds_anpham');
    }
};
