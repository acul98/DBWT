<?php

$link = mysqli_connect(
    "localhost",           // Host der Datenbank
    "root",                // Benutzername zur Anmeldung
    "Passwort",          // Passwort
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







$sqlpasswort2="lucatest";

$salt2 = "dbwt";

$test2 = sha1($salt2 . $sqlpasswort2);

$sqlpasswortsetzen2 = "UPDATE benutzer SET passwort='$test2' WHERE id=2";

$resultpasswortsetzen2 = mysqli_query($link, $sqlpasswortsetzen2);

