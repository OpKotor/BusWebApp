<?php
// Provjera vaučera
$vaucer = $_POST['vaucer_kod'];

$sql = "SELECT * FROM vaucers WHERE kod = '$vaucer' AND iskoriscen = 0";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Vaučer je validan!";
    // Obilježi vaučer kao iskorišćen
    $sql = "UPDATE vaucers SET iskoriscen = 1 WHERE kod = '$vaucer'";
    $conn->query($sql);
} else {
    echo "Vaučer nije validan ili je već iskorišćen.";
}
?>
