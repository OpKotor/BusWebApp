<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlotoviTable extends Migration
{
    public function up()
    {
        Schema::create('slotovi', function (Blueprint $table) {
            $table->id();
            $table->date('datum');
            $table->time('vrijeme_pocetka');
            $table->time('vrijeme_zavrsetka');
            $table->enum('tip_vozila', ['A', 'B', 'C']);
            $table->enum('status', ['slobodan', 'rezervisan'])->default('slobodan');
            $table->foreignId('korisnik_id')->nullable()->constrained('korisnici')->onDelete('set null');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('slotovi');
    }
}