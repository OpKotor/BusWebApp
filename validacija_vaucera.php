<?php
// Konekcija s bazom
$conn = new mysqli("localhost", "root", "password", "rezervacija");

if ($conn->connect_error) {
    die("Greška u konekciji: " . $conn->connect_error);
}

// Proverite vaučer kod iz POST zahteva
$vaucer = $_POST['vaucer_kod'];

// Validacija ulaznih podataka
if (!isset($vaucer) || empty($vaucer)) {
    die("Greška: Vaučer kod nije unet.");
}

if (!preg_match('/^[a-zA-Z0-9]+$/', $vaucer)) {
    die("Greška: Vaučer kod sadrži nevalidne karaktere.");
}

if (strlen($vaucer) > 10) {
    die("Greška: Vaučer kod je predugačak.");
}

// Pripremljeni upit za proveru vaučera
$stmt = $conn->prepare("SELECT * FROM vaucers WHERE kod = ? AND iskoriscen = 0");
$stmt->bind_param("s", $vaucer);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Vaučer je validan!";
    // Obeleži vaučer kao iskorišćen
    $updateStmt = $conn->prepare("UPDATE vaucers SET iskoriscen = 1 WHERE kod = ?");
    $updateStmt->bind_param("s", $vaucer);
    $updateStmt->execute();
    $updateStmt->close();
} else {
    echo "Vaučer nije validan ili je već iskorišćen.";
}

$stmt->close();
$conn->close();
?>