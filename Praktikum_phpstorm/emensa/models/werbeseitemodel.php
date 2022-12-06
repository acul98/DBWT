<?php
/*
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
*/
function Gerichteausgabe()
{
    $link = connectdb();

    $tabelle = "SELECT g.bildname, g.name, preis_extern, preis_intern, group_concat(gha.code) AS acode, group_concat(a.name) AS aname   
                      FROM gericht_hat_allergen gha
                      RIGHT JOIN gericht g ON g.id = gha.gericht_id
                      LEFT JOIN allergen a ON a.code = gha.code
                      GROUP BY g.name ORDER BY 'ASC' LIMIT 5 ;";

//echo '<table>';
//echo '<tr>' . '<th> Gericht </th>' . '<th> Preis intern </th>' . '<th> Preis extern </th>' . '<th> Enthaltene Allergene </th>' . '</tr>';

    $result = mysqli_query($link, $tabelle);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $data;
}
/* mysqli_fetch_assoc = gbt als ergebnis einen assoziatives array zurück. Diese kann man mit der while schelife reihe für reihe durchgehen.
while ($row = mysqli_fetch_assoc($result)) {

    echo "<tr>",
        '<td>' . $row['name'] . '</td>',
        '<td>' . number_format($row['preis_intern'], 2) . '€' . '</td>',
        '<td>' . number_format($row['preis_extern'], 2) . '€' . '</td>',
        '<td>' . $row['acode'] . '</td>',
    "</tr>";
}
echo "</table>";

echo '<br>' . '<br>' . '<h4>  Allergenbezeichnung </h4>' . '<br>' . '<br>';
foreach ($result as $tabelle) {
    if ($tabelle['acode'] != null)
        echo '<li>' . $tabelle['acode'] . ' = ' . $tabelle['aname'] . '<br><br></li>';
}
*/
