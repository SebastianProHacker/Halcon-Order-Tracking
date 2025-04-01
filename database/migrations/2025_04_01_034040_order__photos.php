<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration 
{
    public function up() 
    {
        Schema::create('order_photos', function (Blueprint $table) {
            $table->id('idPhoto');
            $table->unsignedBigInteger('idOrder');
            $table->enum('photoType', ['Loaded', 'Delivered']);
            $table->string('path');

            $table->foreign('idOrder')->references('idOrder')->on('orders')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down() 
    {
        Schema::dropIfExists('order_photos');
    }
};

