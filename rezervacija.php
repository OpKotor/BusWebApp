<?php
require 'db.php'; // Uključuje fajl za konekciju

// Podaci o kupcu dolaze iz POST zahteva
$datum = $_POST['datum'];
$vrijeme_pocetka = $_POST['vrijeme_pocetka'];
$vrijeme_zavrsetka = $_POST['vrijeme_zavrsetka'];
$tip_vozila = $_POST['tip_vozila'];
$ime_kupca = $_POST['ime_kupca'];
$email_kupca = $_POST['email_kupca'];
$telefon_kupca = $_POST['telefon_kupca'];

// Provera da li slot postoji i da li je slobodan
$query = "SELECT * FROM slotovi 
          WHERE datum = ? AND vrijeme_pocetka = ? AND vrijeme_zavrsetka = ? AND tip_vozila = ? AND status = 'slobodan'";
$stmt = $mysqli->prepare($query);
$stmt->bind_param('ssss', $datum, $vrijeme_pocetka, $vrijeme_zavrsetka, $tip_vozila);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Slot je slobodan, ažuriraj status i dodaj kupca
    $update = "UPDATE slotovi 
               SET status = 'rezervisan', ime_kupca = ?, email_kupca = ?, telefon_kupca = ? 
               WHERE datum = ? AND vrijeme_pocetka = ? AND vrijeme_zavrsetka = ? AND tip_vozila = ?";
    $stmt = $mysqli->prepare($update);
    $stmt->bind_param('sssssss', $ime_kupca, $email_kupca, $telefon_kupca, $datum, $vrijeme_pocetka, $vrijeme_zavrsetka, $tip_vozila);

    if ($stmt->execute()) {
        echo "Rezervacija je uspešno obavljena !";
    } else {
        echo "Greška prilikom rezervacije: " . $mysqli->error;
    }
} else {
    echo "Slot nije dostupan";
}
?>