<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Korisnički Podaci</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Unesite Podatke za Rezervaciju</h1>

        <form action="{{ route('sacuvajKorisnika') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-3">
                <label for="ime_firme" class="form-label">Naziv Firme / Ime</label>
                <input type="text" class="form-control" id="ime_firme" name="ime_firme" required>
            </div>
            <div class="mb-3">
                <label for="drzava" class="form-label">Država</label>
                <input type="text" class="form-control" id="drzava" name="drzava" required>
            </div>
            <div class="mb-3">
                <label for="registarske_oznake" class="form-label">Registarske Oznake</label>
                <input type="text" class="form-control" id="registarske_oznake" name="registarske_oznake" required>
            </div>
            <div class="mb-3">
                <label for="tip_vozila" class="form-label">Tip Vozila</label>
                <select class="form-select" id="tip_vozila" name="tip_vozila" required>
                    <option value="A">A (8+1 mjesta) - 15€</option>
                    <option value="B">B (9-30 mjesta) - 30€</option>
                    <option value="C">C (30+ mjesta) - 50€</option>
                </select>
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="saglasnost" name="saglasnost" required>
                <label class="form-check-label" for="saglasnost">
                    Saglasan sam sa procijenjenim vremenom dolaska i mogućim kašnjenjima.
                </label>
            </div>
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="mjesto_kašnjenja" name="mjesto_kašnjenja" required>
                <label class="form-check-label" for="mjesto_kašnjenja">
                    Upoznat sam sa mogućnošću novog mjesta iskrcaja/ukrcaja u slučaju kašnjenja.
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Sačuvaj i Nastavi</button>
        </form>
    </div>
</body>
</html>