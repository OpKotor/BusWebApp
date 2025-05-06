<?php

// Uključivanje konekcije sa bazom
$mysqli = require_once __DIR__ . '/db.php';

// SQL upit za dobijanje podataka
$sql = "SELECT * FROM slotovi"; // Primer upita
$result = $mysqli->query($sql);

if (!$result) {
    die("Greška u upitu: " . $mysqli->error);
}
?>

<!-- HTML za prikaz podataka -->
<thead>
    <tr>
        <th>Datum</th>
        <th>Vrijeme</th>
        <th>Tip Vozila</th>
        <th>Rezervacija</th>
    </tr>
</thead>
<tbody>
    <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['datum']) ?></td>
                <td><?= htmlspecialchars($row['vrijeme_pocetka']) ?> - <?= htmlspecialchars($row['vrijeme_zavrsetka']) ?></td>
                <td><?= htmlspecialchars($row['tip_vozila']) ?></td>
                <td>
                    <?php if ($row['status'] === 'slobodan'): ?>
                        <a href="rezervacija.php?slot_id=<?= htmlspecialchars($row['id']) ?>" class="btn btn-primary">Rezerviši</a>
                    <?php else: ?>
                        <span class="text-danger">Zauzet</span>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr>
            <td colspan="4">Nema slobodnih slotova</td>
        </tr>
    <?php endif; ?>
</tbody>