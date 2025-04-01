<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration 
{
    public function up() 
    {
        Schema::create('personnels', function (Blueprint $table) {
            $table->id('idUser');
            $table->string('name');
            $table->string('password');
            $table->unsignedBigInteger('idRole');
            $table->foreign('idRole')->references('idRole')->on('roles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down() 
    {
        Schema::dropIfExists('personnels');
    }
};

