<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Placanje extends Model
{
    use HasFactory;

    protected $fillable = ['korisnik_id', 'slot_id', 'iznos', 'status'];
}