<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration 
{
    public function up() 
    {
        Schema::create('status', function (Blueprint $table) {
            $table->id('idStatus');
            $table->enum('statusName', ['Ordered', 'In process', 'In route', 'Delivered', 'Deleted']);
            $table->timestamps();
        });
    }

    public function down() 
    {
        Schema::dropIfExists('status');
    }
};

