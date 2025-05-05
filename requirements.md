# Specifikacija funkcionalnosti za aplikaciju

## Korisnički front
1. **Dvojezičnost (MNE / ENG)**:
   - Implementirati mehanizam za prevođenje (npr. i18next za React).
   - Jezik se bira putem dropdown menija ili automatski prema podešavanjima korisnikovog pregledača.

2. **Datum i vrijeme iskrcaja/ukrcaja**:
   - Kalendar sa vremenskim okvirima za tekuću godinu.
   - Validacija za odabir datuma unutar tekuće godine.

3. **Trajanje slota i tolerancija**:
   - Slot traje 15 minuta, ali ukupan vremenski okvir je 30 minuta.
   - Definisati pravilo za toleranciju kašnjenja (npr. 5 minuta).

4. **Rezervacija slotova**:
   - Dostupni intervali od 07:00 do 20:00.
   - Onemogućiti preklapanje slotova.
   - Kupovina više slotova od strane istog korisnika u istom danu može biti ograničena.
   - Slotovi između 20:00 i 07:00 su obavezni, ali uz cenu nula dinara.

5. **Vidljivost broja slobodnih mjesta**:
   - Prikazati broj slobodnih slotova za svaki termin.

6. **Podaci o korisniku za rezervaciju**:
   - Obavezna polja:
     - Naziv firme ili fizičkog lica.
     - Država.
     - Registarske oznake vozila.
     - Tip vozila: A (8+1), B (9-30), C (30+).
   - Checkbox za saglasnost o vremenu dolaska i kašnjenjima.
   - Registarske oznake i tip vozila vidljivi inkasantu.

7. **Email za notifikacije**:
   - Opcija za unos email adrese ako korisnik želi primiti notifikaciju.
   - Slanje obavještenja pola sata prije termina.

8. **Google Maps link**:
   - Prije plaćanja, korisnik dobija link sa lokacijom iskrcaja/ukrcaja.

9. **Plaćanje**:
   - Cene uparene sa tipom vozila.
   - Vrste plaćanja:
     - Elektronsko (kreditna/debitna kartica).
     - PayPal.
     - Vaučer.

10. **PDF račun**:
    - Automatsko generisanje računa sa QR kodom.
    - Račun u skladu sa zakonskim propisima.

11. **Rotacija mjesta iskrcaja/ukrcaja**:
    - Mesta se rotiraju svakog dana u 14:00 h:
      - 07:00-14:00: 5 slotova za iskrcaj, 2 za ukrcaj.
      - 14:01-20:00: Obrnuto.

12. **Pravila privatnosti, uslovi kupovine, kontakti**:
    - Linkovi za pravne dokumente i kontakt informacije.

---

## Administratorski front
1. **Admin login**:
   - Sistem za autentifikaciju i autorizaciju.

2. **Mijenjanje cijena**:
   - Mogućnost ažuriranja cena za slotove.

3. **Zatvaranje slotova**:
   - Opcija za zatvaranje slotova (npr. za delegacije, ekskurzije).

4. **Pregled rezervacija za inkasante**:
   - Prikaz rezervacija sa detaljima (registarske oznake, tip vozila).
   - Poseban link ili login za inkasante.

5. **Izvještaji**:
   - Automatsko slanje dnevnih izveštaja finansijama putem email-a.