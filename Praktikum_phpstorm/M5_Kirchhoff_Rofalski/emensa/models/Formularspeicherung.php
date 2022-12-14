<?php
/*
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

function newsletteranmeldung()
{
    if (isset($_POST['senden'])) {

        //Eingabe Vorname prüfen
        if (!preg_match("/^[a-zA-ZäüöÄÜÖ ]+$/", $vorname)) {
            $ausgabe1 =  'Nicht akzeptiertes Zeichen in Ihrer Eingabe';
        }


        //Eingabe Nachname prüfen
        if (!preg_match("/^[a-zA-ZäüöÄÜÖ ]+$/", $nachname)) {
            echo 'Nicht akzeptiertes Zeichen in Ihrere Eingabe' . '<br>';
        }

        //Eingabe Datenschutzerklärung gelesen prüfen
        if ($info == 0) {
            echo 'Bitte akzeptieren Sie die Datenschutzerklärung' . '<br>';
        }


        //Email prüfen (hier wird die Funktion Email aufgeraufen (gespeichert in Formularspeicherung.php)
        if (!checkmail($email)) {
            echo 'Die von Ihnen angegebene Mail Adresse entspricht nicht unseren Vorgaben.' . '<br>';
        }


        //Speicherung der Daten in die Textdatei: formular.txt
        $file = fopen("formular.txt","a");
        if (!$file) {
            die('Öffnen fehlgeschlagen');
        }

        foreach($dateiname as $key => $dateiname) {
            $line = "$key,$dateiname\n";
            fwrite($file, $line);
        }
        fclose($file);

    }
}



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


/*

?>
