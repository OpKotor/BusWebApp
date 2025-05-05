<?php
require('fpdf.php');

class PDF extends FPDF {
    function Header() {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Racun za rezervaciju', 0, 1, 'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

// Podaci o korisniku i uplati
$pdf->Cell(0, 10, 'Ime firme: ' . $_GET['ime_firme'], 0, 1);
$pdf->Cell(0, 10, 'Datum: ' . date('Y-m-d'), 0, 1);
$pdf->Cell(0, 10, 'Iznos: ' . $_GET['iznos'] . '€', 0, 1);

// QR kod (može se generisati pomoću eksternih biblioteka kao što je phpqrcode)
// Primer:
$pdf->Cell(0, 20, 'QR kod ovde...', 0, 1);

$pdf->Output();
?>