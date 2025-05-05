<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacanjaTable extends Migration
{
    public function up()
    {
        Schema::create('placanja', function (Blueprint $table) {
            $table->id();
            $table->foreignId('korisnik_id')->constrained('korisnici')->onDelete('cascade');
            $table->foreignId('slot_id')->constrained('slotovi')->onDelete('cascade');
            $table->decimal('iznos', 10, 2);
            $table->enum('status', ['uspjesno', 'neuspjesno'])->default('uspjesno');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('placanja');
    }
}