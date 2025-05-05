<?php
// Uključivanje potrebnih biblioteka
require_once 'libs/qrlib.php'; // phpqrcode biblioteka
require_once 'libs/fpdf.php'; // FPDF biblioteka

// Tekst koji će biti enkodiran u QR kod
$text = "https://www.example.com";

// Lokacija gde će QR kod biti privremeno sačuvan
$tempDir = "temp/";
if (!file_exists($tempDir)) {
    mkdir($tempDir, 0777, true);
}
$qrFilePath = $tempDir . "qrcode.png";

// Generisanje QR koda
QRcode::png($text, $qrFilePath, QR_ECLEVEL_L, 10, 2);

// Kreiranje PDF dokumenta
class PDF extends FPDF {
    function Header() {
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, 'QR Kod u PDF Dokumentu', 0, 1, 'C');
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

// Dodavanje teksta u PDF
$pdf->Cell(0, 10, 'Skenerom učitajte QR kod ispod:', 0, 1);
$pdf->Ln(10);

// Dodavanje QR koda u PDF
$pdf->Image($qrFilePath, $pdf->GetX(), $pdf->GetY(), 50, 50);
$pdf->Ln(60);

// Dodavanje dodatnog teksta ispod QR koda
$pdf->Cell(0, 10, 'Ovaj QR kod vodi na: ' . $text, 0, 1);

// Generisanje PDF fajla
$pdfOutputPath = "generated_pdf/qr_document.pdf";
if (!file_exists("generated_pdf")) {
    mkdir("generated_pdf", 0777, true);
}
$pdf->Output($pdfOutputPath, 'F');

// Brisanje privremenog QR koda
unlink($qrFilePath);

// Prikaz poruke o uspehu
echo "PDF sa QR kodom je uspešno generisan! Preuzmite ga ovde: <a href='$pdfOutputPath'>QR PDF</a>";
?>