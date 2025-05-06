<?php
$host = 'localhost';
$user = 'OpKotor'; // Vaše korisničko ime
$password = 'bidonkaktus123'; // Vaša lozinka
$database = 'buswebapp';

// Konekcija sa bazom
$mysqli = new mysqli($host, $user, $password, $database);

// Provera konekcije
if ($mysqli->connect_error) {
    die('Konekcija nije uspela: ' . $mysqli->connect_error);
}
?>