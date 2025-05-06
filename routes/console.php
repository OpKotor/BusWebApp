<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| Ova datoteka se koristi za definisanje svih Closure zasnovanih
| konzolnih komandi za vašu aplikaciju. Svaka Closure je povezana
| sa instancom komandne linije, omogućavajući jednostavno
| interagovanje sa vašim korisnicima.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');