<?php

// Uključivanje db.php fajla
$mysqli = require_once __DIR__ . '/db.php';

// Provera konekcije
if ($mysqli->ping()) {
    echo "Konekcija sa bazom je uspešna!";
} else {
    echo "Konekcija sa bazom nije uspela: " . $mysqli->error;
}