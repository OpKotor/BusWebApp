<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;

    protected $fillable = ['datum', 'vrijeme_pocetka', 'vrijeme_zavrsetka', 'tip_vozila', 'status', 'korisnik_id'];
}