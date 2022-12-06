<?php

$vorname = $_POST['vorname'] ?? NULL; //Alle Angaben gemacht?
$nachname = $_POST['nachname'] ?? NULL;
$email = $_POST['email'] ?? NULL;
$info = $_POST['info'] ?? NULL;

$dateiname = [                          //Array mit Angaben erstellen
    'Vorname' => $vorname,
    'Nachname' => $nachname,
    'Email' => $email,
    'Info' => $info
];

function checkmail(string $email): bool         //Ist Email eine Wegwerfmail?
{

    $falschemails = [0 => 'rcpt.at',
        1 => 'damnthespam.at',
        2 => 'wegwerfmail.de',
        3 => 'trashmail.de',
        4 => 'trashmail.com'];

    $i = count($falschemails);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  // ist es eine valide email adresse oder nicht (Email Musterüberprüfung)
        return false;
    }


    for ($a = 0; $a < $i; $a++) {
        if (str_contains($email, $falschemails[$a])) {
            return false;
        }
    }

    return true;

}

?>


