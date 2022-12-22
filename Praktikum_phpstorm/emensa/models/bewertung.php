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

if (!empty($_POST['Absenden'])) {//Wenn POST NICHT leer ist, sollen die im Formular übergebenen Werte in Variablen geschrieben werden
    $Bemerkung = $_POST['Bemerkung'];
    $gerichtid =       //ID des Gerichts übergeben
    $Admin =  //Prüfen ob Admin ist
    $Sterne = $_POST['Bewertung'];
    $namebenutzer = $_SESSION['nutzer'];
    $benutzerid = "SELECT id From benutzer WHERE name = '$namebenutzer'";

    $datum = date('Y-m-d H:i:s'); //Datum und Uhrzeit wird gesetzt


    $sql = "INSERT INTO bewertungen(bewertungs_id, bemerkung,bewertungszeitpunkt, hervorgehoben, sternebewertung, gericht_id)
        VALUES ('$namebenutzer', '$Bemerkung', '$datum', '$Admin', '$Sterne','$gerichtid')";
    //Werte werden in die Tabelle WUnschgericht geschrieben

    mysqli_query($link, $sql);

    echo "Ihre Bewertung wurde versendet.";
}
