<?php
// Provjera vaučera
$vaucer = $_POST['vaucer_kod'];

// Koristimo pripremljenu izjavu za bezbednost
$stmt = $conn->prepare("SELECT * FROM vaucers WHERE kod = ? AND iskoriscen = 0");
$stmt->bind_param("s", $vaucer);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Vaučer je validan!";
    // Obilježavanje vaučera kao iskorišćenog
    $updateStmt = $conn->prepare("UPDATE vaucers SET iskoriscen = 1 WHERE kod = ?");
    $updateStmt->bind_param("s", $vaucer);
    $updateStmt->execute();
    $updateStmt->close();
} else {
    echo "Vaučer nije validan ili je već iskorišćen.";
}

$stmt->close();
?>