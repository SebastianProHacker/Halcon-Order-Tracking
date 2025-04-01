<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration 
{
    public function up() 
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('idOrder');
            $table->unsignedBigInteger('idStatus');
            $table->unsignedBigInteger('idCustomer');
            $table->dateTime('orderDate');
            $table->string('orderAddress');
            $table->text('notes')->nullable();

            $table->foreign('idStatus')->references('idStatus')->on('status')->onDelete('cascade');
            $table->foreign('idCustomer')->references('idCustomer')->on('customers')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down() 
    {
        Schema::dropIfExists('orders');
    }
};

