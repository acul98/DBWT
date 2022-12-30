<?php



$link = mysqli_connect(
    "localhost",           // Host der Datenbank
    "root",                // Benutzername zur Anmeldung
    "Passwort",          // Passwort
    "emensawerbeseite"     // Auswahl der Datenbanken (bzw. des Schemas)
// optional port der Datenbank
);

if (!$link) {
    echo "Verbindung fehlgeschlagen: ", mysqli_connect_error(); //Falls Verbindung nicht aufgebaut werden kann
    exit();
}
/*
function Bewertungsausgabe()
{
    $link = connectdb();

    $tabelle = "SELECT g.name, b.bemerkung, b.sternebewertung, b.bewertungszeitpunkt
                      FROM bewertungen b
                      RIGHT JOIN gericht g ON g.id = b.gericht_id
                      GROUP BY g.name ORDER BY bewertungszeitpunkt 'ASC' LIMIT 30 ;";


    $result = mysqli_query($link, $tabelle);
    return $result;
}*/