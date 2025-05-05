<?php
// Uključivanje potrebnih biblioteka
require_once 'libs/qrlib.php'; // phpqrcode biblioteka
require_once 'libs/fpdf.php'; // FPDF biblioteka

// Informacije o rezervaciji
$imeFirme = "Primjer Firma";
$datum = date("Y-m-d");
$iznos = "30.00€";
$qrText = "https://www.example.com/rezervacija?firma=" . urlencode($imeFirme) . "&datum=" . $datum . "&iznos=" . $iznos;

// Lokacija gde će QR kod privremeno biti sačuvan
$tempDir = "temp/";
if (!file_exists($tempDir)) {
    mkdir($tempDir, 0777, true);
}
$qrFilePath = $tempDir . "qrcode.png";

// Generisanje QR koda
QRcode::png($qrText, $qrFilePath, QR_ECLEVEL_L, 10, 2);

// Kreiranje PDF dokumenta
class PDF extends FPDF {
    function Header() {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'Potvrda o Rezervaciji', 0, 1, 'C');
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Stranica ' . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

// Dodavanje detalja o rezervaciji
$pdf->Cell(0, 10, 'Ime firme: ' . $imeFirme, 0, 1);
$pdf->Cell(0, 10, 'Datum rezervacije: ' . $datum, 0, 1);
$pdf->Cell(0, 10, 'Iznos: ' . $iznos, 0, 1);
$pdf->Ln(10);

// Dodavanje QR koda u PDF
$pdf->Cell(0, 10, 'Skenerom učitajte QR kod za više informacija:', 0, 1);
$pdf->Image($qrFilePath, $pdf->GetX(), $pdf->GetY(), 50, 50);
$pdf->Ln(60);

// Generisanje PDF fajla
$pdfOutputPath = "generated_pdf/rezervacija_" . time() . ".pdf";
if (!file_exists("generated_pdf")) {
    mkdir("generated_pdf", 0777, true);
}
$pdf->Output($pdfOutputPath, 'F');

// Brisanje privremenog QR koda
unlink($qrFilePath);

// Prikaz poruke o uspehu
echo "PDF račun je uspešno generisan! Preuzmite ga ovde: <a href='$pdfOutputPath'>Preuzmi PDF</a>";
?>