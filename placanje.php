<?php
require 'db.php'; // Uključuje fajl za konekciju

// Podaci o plaćanju dolaze iz POST zahteva
$slot_id = $_POST['slot_id'];
$iznos = $_POST['iznos'];
$ime_kupca = $_POST['ime_kupca'];
$email_kupca = $_POST['email_kupca'];
$telefon_kupca = $_POST['telefon_kupca'];
$status = $_POST['status']; // Može biti 'uspjesno' ili 'neuspjesno'

// Provera da li slot postoji
$query = "SELECT * FROM slotovi WHERE id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('i', $slot_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Dodavanje plaćanja u tabelu
    $insert = "INSERT INTO placanja (slot_id, iznos, ime_kupca, email_kupca, telefon_kupca, status) 
               VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $mysqli->prepare($insert);
    $stmt->bind_param('idssss', $slot_id, $iznos, $ime_kupca, $email_kupca, $telefon_kupca, $status);

    if ($stmt->execute()) {
        echo "Plaćanje je uspešno izvršeno !";
    } else {
        echo "Greška prilikom plaćanja: " . $mysqli->error;
    }
} else {
    echo "Slot ne postoji.";
}
?>