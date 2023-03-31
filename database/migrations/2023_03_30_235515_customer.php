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
        Schema::create('customer',function($table){
           $table->id();
           $table->string('nama')->nullable();
           $table->text('alamat')->nullable();
           $table->date('tanggal_lahir')->default(0);
           $table->string('jenis_kelamin')->nullable();
           $table->string('telpon')->nullable();
           $table->string('status')->nullable();
           $table->timestamps();
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExist('customer');
    }
};