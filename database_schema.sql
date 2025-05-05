CREATE DATABASE korisnici (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ime_firme VARCHAR(255) NOT NULL,
    drzava VARCHAR(100) NOT NULL,
    email VARCHAR(255),
    registarske_oznake VARCHAR(50) NOT NULL,
    tip_vozila ENUM('A', 'B', 'C') NOT NULL
);

CREATE DATABASE slotovi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    datum DATE NOT NULL,
    vrijeme_pocetka TIME NOT NULL,
    vrijeme_zavrsetka TIME NOT NULL,
    tip_vozila ENUM('A', 'B', 'C') NOT NULL,
    status ENUM('slobodan', 'rezervisan') DEFAULT 'slobodan',
    korisnik_id INT,
    FOREIGN KEY (korisnik_id) REFERENCES korisnici(id)
);

CREATE DATABASE placanja (
    id INT AUTO_INCREMENT PRIMARY KEY,
    korisnik_id INT,
    slot_id INT,
    iznos DECIMAL(10, 2) NOT NULL,
    status ENUM('uspjesno', 'neuspjesno') DEFAULT 'uspjesno',
    datum_vrijeme TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (korisnik_id) REFERENCES korisnici(id),
    FOREIGN KEY (slot_id) REFERENCES slotovi(id)
);
