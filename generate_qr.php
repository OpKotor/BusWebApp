<?php
// Uključi phpqrcode biblioteku
require_once 'libs/qrlib.php';

// Tekst koji će biti enkodiran u QR kod
$text = "https://www.example.com";

// Lokacija gde će biti sačuvana generisana slika
$output_file = 'qrcodes/qrcode_example.png';

// Proveri da li folder za QR kodove postoji, ako ne - kreiraj ga
if (!file_exists('qrcodes')) {
    mkdir('qrcodes', 0777, true);
}

// Generiši QR kod i sačuvaj ga kao sliku
QRcode::png($text, $output_file, QR_ECLEVEL_L, 10, 2);

// Prikaz poruke o uspehu
echo "QR kod je uspešno generisan! Pogledaj ga ovde: <a href='$output_file'>QR kod</a>";
?>