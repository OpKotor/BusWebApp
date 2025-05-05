<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Korisnik extends Model
{
    use HasFactory;

    protected $fillable = ['ime_firme', 'drzava', 'email', 'registarske_oznake', 'tip_vozila'];
}