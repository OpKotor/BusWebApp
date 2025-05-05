use App\Http\Controllers\SlotController;
use App\Http\Controllers\KorisnikController;

Route::get('/slotovi', [SlotController::class, 'index'])->name('slotovi');
Route::post('/rezervisi', [SlotController::class, 'rezervisi'])->name('rezervisi');

Route::get('/korisnik', [KorisnikController::class, 'prikaziFormu'])->name('korisnik');
Route::post('/korisnik', [KorisnikController::class, 'sacuvaj'])->name('sacuvajKorisnika');