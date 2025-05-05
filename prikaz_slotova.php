<?php
// Konekcija s bazom
$conn = new mysqli("localhost", "root", "password", "rezervacija");

if ($conn->connect_error) {
    die("Greška u konekciji: " . $conn->connect_error);
}

// Dohvati slotove
$sql = "SELECT * FROM slotovi WHERE datum = CURDATE() AND status = 'slobodan'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dostupni Slotovi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Dostupni Slotovi</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Datum</th>
                    <th>Vrijeme</th>
                    <th>Tip Vozila</th>
                    <th>Status</th>
                    <th>Rezervacija</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['datum'] ?></td>
                            <td><?= $row['vrijeme_pocetka'] ?> - <?= $row['vrijeme_zavrsetka'] ?></td>
                            <td><?= $row['tip_vozila'] ?></td>
                            <td><?= $row['status'] ?></td>
                            <td>
                                <a href="rezervacija.php?slot_id=<?= $row['id'] ?>" class="btn btn-primary">Rezerviši</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Nema slobodnih slotova za danas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</body>
</html>