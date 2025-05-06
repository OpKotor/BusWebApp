USE buswebapp;

-- Tabela za slotove
CREATE TABLE slotovi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    datum DATE NOT NULL,
    vrijeme_pocetka TIME NOT NULL,
    vrijeme_zavrsetka TIME NOT NULL,
    tip_vozila ENUM('Tip A (8+1 mjesta)', 'Tip B (9-30 mjesta)', 'Tip C (30+ mjesta)') NOT NULL,
    status ENUM('slobodan', 'rezervisan') DEFAULT 'slobodan',
    ime_kupca VARCHAR(255),          -- Dodato polje za ime kupca
    email_kupca VARCHAR(255),        -- Dodato polje za email kupca
    telefon_kupca VARCHAR(20)        -- Dodato polje za telefon kupca
);

-- Tabela za plaćanja
CREATE TABLE placanja (
    id INT AUTO_INCREMENT PRIMARY KEY,
    slot_id INT,
    iznos DECIMAL(10, 2) NOT NULL,
    ime_kupca VARCHAR(255),          -- Dodato polje za ime kupca
    email_kupca VARCHAR(255),        -- Dodato polje za email kupca
    telefon_kupca VARCHAR(20),       -- Dodato polje za telefon kupca
    status ENUM('uspjesno', 'neuspjesno') DEFAULT 'uspjesno',
    datum_vrijeme TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (slot_id) REFERENCES slotovi(id)
);