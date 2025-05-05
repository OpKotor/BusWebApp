<?php

namespace App\Http\Controllers;

use App\Models\Korisnik;
use Illuminate\Http\Request;

class KorisnikController extends Controller
{
    public function prikaziFormu()
    {
        return view('korisnik');
    }

    public function sacuvaj(Request $request)
    {
        Korisnik::create($request->all());
        return redirect()->route('slotovi')->with('success', 'Podaci su sačuvani!');
    }
}