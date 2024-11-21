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
        Schema::create('chitiethoadonthue', function (Blueprint $table) {
            $table->integer('macthoadon')->autoIncrement();
            $table->integer('maanpham'); 
            $table->integer('mahoadon'); 

            $table->foreign('maanpham')->references('maanpham')->on('ds_anpham')->onDelete('cascade');
            $table->foreign('mahoadon')->references('mahoadon')->on('hoadonthueanpham')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chitiethoadonthue', function (Blueprint $table) {
            $table->dropForeign(['maanpham']);
            $table->dropForeign(['mahoadon']);
        });

        Schema::dropIfExists('chitiethoadonthue');
    }
};
