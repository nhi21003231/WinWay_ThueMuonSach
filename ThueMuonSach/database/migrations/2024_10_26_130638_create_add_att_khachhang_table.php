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
        Schema::table('khachhang', function (Blueprint $table) {
            //
            $table->string('SoDienThoai',10)->nullable();
            $table->string('Email',50)->nullable();
            $table->string('DiaChi',100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('khachhang', function (Blueprint $table) {
            //
            $table->dropColumn('SoDienThoai');
            $table->dropColumn('Email');
            $table->dropColumn('DiaChi');
        });
    }
};
