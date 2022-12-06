<?php
$link = mysqli_connect(
    "localhost",           // Host der Datenbank
    "root",                // Benutzername zur Anmeldung
    "passwort",          // Passwort
    "emensawerbeseite"     // Auswahl der Datenbanken (bzw. des Schemas)
// optional port der Datenbank
);

$test = "SELECT id, name FROM gericht;";

echo $test;

?>