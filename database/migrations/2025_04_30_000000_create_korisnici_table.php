<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKorisniciTable extends Migration
{
    public function up()
    {
        Schema::create('korisnici', function (Blueprint $table) {
            $table->id();
            $table->string('ime_firme');
            $table->string('drzava');
            $table->string('email')->nullable();
            $table->string('registarske_oznake');
            $table->enum('tip_vozila', ['A', 'B', 'C']);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('korisnici');
    }
}