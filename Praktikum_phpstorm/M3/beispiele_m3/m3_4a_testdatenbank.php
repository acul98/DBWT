<?php

$link = mysqli_connect("localhost", // Host der Datenbank
    "root",                 // Benutzername zur Anmeldung
    "Isenbruch9",    // Passwort
    "emensawerbeseite"      // Auswahl der Datenbanken (bzw. des Schemas)
// optional port der Datenbank
);

if (!$link) {
    echo "Verbindung fehlgeschlagen: ", mysqli_connect_error();
    exit();
}

$sql = "SELECT name, beschreibung FROM gericht ORDER BY name DESC LIMIT 5;";

$result = mysqli_query($link, $sql);

if (!$result) {
    echo "Fehler während der Abfrage:  ", mysqli_error($link);
    exit();
}


echo '<table border="8" cellspacing="10" cellpadding="20">';
echo '<tr>' . '<th> Gericht </th>'. '<th> Beschreibung </th>' . '</tr>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>'. '<td>' . $row['name'] . '</td>',
                  '<td>' . $row['beschreibung'] . '</td>'. '</tr>';
}
echo '</table>';


// mysqli_free_result($result);
mysqli_close($link);