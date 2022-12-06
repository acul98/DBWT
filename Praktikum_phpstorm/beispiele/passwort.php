<?php

$link = mysqli_connect(
    "localhost",           // Host der Datenbank
    "root",                // Benutzername zur Anmeldung
    "Isenbruch9",          // Passwort
    "emensawerbeseite"     // Auswahl der Datenbanken (bzw. des Schemas)
// optional port der Datenbank
);

if (!$link) {
    echo "Verbindung fehlgeschlagen: ", mysqli_connect_error();
    exit();
}

$sqlpasswort="password123";
$salt = "dbwt";

$test = sha1($salt . $sqlpasswort);

$sqlpasswortsetzen = "UPDATE benutzer SET passwort='$test' WHERE id=1";

$resultpasswortsetzen = mysqli_query($link, $sqlpasswortsetzen);

