<?php
include('WunschgerichtSeite.php');

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

if (!empty($_POST['Abschicken'])) {                 //Wenn POST NICHT leer ist, sollen die im Formular übergebenen Werte in Variablen geschrieben werden
    $Name = $_POST['Name'];
    $email = $_POST['email'];
    $Gerichtname = $_POST['Gerichtname'];
    $gerichtbeschreibung = $_POST['gerichtbeschreibung'];

    $datum = date('Y-m-d H:i:s');           //Datum und Uhrzeit wird gesetzt

    $sql = "INSERT INTO wunschgericht(wunschgerichtname, beschreibung, erstellungsdatum, erstellername, ersteller_email)
        VALUES ('$Gerichtname', '$gerichtbeschreibung', '$datum', '$Name', '$email')";
    //Werte werden in die Tabelle WUnschgericht geschrieben

mysqli_query($link, $sql);

echo "Ihr Wunsch wurde versendet."; }
