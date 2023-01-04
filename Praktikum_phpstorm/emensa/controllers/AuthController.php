<?php
require_once('../models/benutzer.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../public/index.php');
require_once('../models/werbeseitemodel.php');
require_once('../models/bewertung.php');

class AuthController
{

    public function registrierung(RequestData $rd)
    {
        $rrm = $_SESSION['registrierung_result_message'] ?? null;
        return view('Werbeseite.registrierung', ['rrm' => $rrm]);
    }

    function registrierung_verifizieren(RequestData $rd)
    {
        $name = $rd->query['name'] ?? false;
        $email = $rd->query['email'] ?? false;
        $password = $rd->query['password'] ?? false;

        $benutzer_db = db_select_benutzer();

        $salt = 'dbwt';
        $password_userinput = sha1($salt . $password);

        foreach ($benutzer_db as $e) {
            if ($e['name'] != $name && $e['email'] != $email && $e['passwort'] != $password_userinput) {
                $_SESSION['registrierung_result_message'] = null;
                $_SESSION['registrierung_ok'] = true;


                $link = connectdb();
                $link->begin_transaction();
                $registrierung = "INSERT INTO benutzer (name,email,passwort,admin,anzahlfehler,anzahlanmeldungen) VALUES ('$name','$email','$password_userinput',false,0,0)";
                $resultletzteregistrierung = mysqli_query($link, $registrierung);
                $link->commit();
                mysqli_close($link);


                header('Location: /werbeseite'); //zurück auf die Werbeseite
                logger()->info('Registrierung erfolgreich');
                logger()->info('Weiterleitung auf Hauptseite nach Registrierung');
            } else {
                $_SESSION['registrierung_result_message'] = 'Name, Email oder Passwort existiert bereits';
                header('Location: /registrierung'); //zurück zur anmeldemaske
                logger()->warning('fehlgeschlagene Registrierung');
            }
        }
    }

    public function anmeldung(RequestData $rd)
    {
        $msg = $_SESSION['login_result_message'] ?? null;
        return view('Werbeseite.anmeldung', ['msg' => $msg]);
    }

    public function abmeldung()
    {
        session_destroy();
        header('Location: /werbeseite');
        logger()->info('Abmeldung');
    }

    function anmeldung_verifizieren(RequestData $rd)
    {
        $email = $rd->query['email'] ?? false;
        $password = $rd->query['password'] ?? false;

        $benutzer_db = db_select_benutzer();

        $salt = 'dbwt';
        $password_userinput = sha1($salt . $password);

        foreach ($benutzer_db as $e) {

            if ($e['email'] === $email) {
                if ($e['passwort'] === $password_userinput) {
                    //counter auf null setzten außer beim admin der darf nicht gesperrt werden, in der db noch ein feld hinzufügen gespert


                    $_SESSION['login_result_message'] = null;
                    $_SESSION['login_ok'] = true;
                    $_SESSION['nutzer'] = $e['name']; //ausgabe des Namens auf der Werbeseite, welcher sich erfolgreich angemeldet hat.
                    $_SESSION['admin'] = $e['admin'];
                    $_SESSION['id'] = $e['id'];

                    $_SESSION['counter'] += 1; //der zähler zählt jee erfolgreiche anmeldung eins hoch
                    $counter = $_SESSION['counter'];
                    $email_db = $e['email'];
                    //Datenbank aufbau und ubdate der anzahlanmeldungen in der Datenbank
                    $link = connectdb();
                    //$link->begin_transaction();

                    $id = id_finden($email_db);
                    $_SESSION['id']=$id;
                    anzahlanmeldungen($id);

                    //$anzahlanmeldungensetzten = "UPDATE benutzer SET anzahlanmeldungen='$counter' WHERE email = '$email'";
                    // $resultanzahlanmeldungensetzten = mysqli_query($link, $anzahlanmeldungensetzten);
                    // $link->commit();

                    $letzteanmeldung = date('Y-m-d H:i:s');
                    $link->begin_transaction();
                    $letzteanmeldungsetzten = "UPDATE benutzer SET letzteanmeldung='$letzteanmeldung' WHERE email = '$email'";
                    $resultletzteanmeldungsetzten = mysqli_query($link, $letzteanmeldungsetzten);
                    $link->commit();
                    mysqli_close($link);


                    header('Location: /werbeseite'); //zurück auf die Werbeseite
                    logger()->info('Anmeldung erfolgreich');
                    logger()->info('Weiterleitung auf Hauptseite nach Anmeldung');

                    return true;
                } else {
                    $link = connectdb();
                    $_SESSION['login_ok'] = false;
                    $letzterfehler = date('Y-m-d H:i:s');
                    $link->begin_transaction();
                    $letzterfehlersetzten = "UPDATE benutzer SET letzterfehler='$letzterfehler' WHERE email = '$email'";
                    $resultletzterfehlersetzten = mysqli_query($link, $letzterfehlersetzten);
                    $link->commit();
                    $_SESSION['login_result_message'] = 'Name oder Passwort falsch';
                    header('Location: /anmeldung'); //zurück zur anmeldemaske
                    logger()->warning('fehlgeschlagene Anmeldung');

                }
            } else {
                $_SESSION['login_ok'] = false;
                $_SESSION['login_result_message'] = 'Name oder Passwort falsch';
                header('Location: /anmeldung'); //zurück zur anmeldemaske
                logger()->warning('fehlgeschlagene Anmeldung');
            }
        }
    }

    public function bewertung(RequestData $rd)
    {

      $tabelle = Bewertungsausgabe();


        $br = $_SESSION['bewertung_result'] ?? null;
        $data = Gerichteausgabe2();
        return view('Werbeseite.bewertung', ['Gerichteausgabe' => $data, 'br' => $br, 'Bewertungsausgabe' => $tabelle]);
    }

    function bewertungeintragen(RequestData $rd)
    {
        $link = connectdb();

        if (!$link) {
            echo "Verbindung fehlgeschlagen: ", mysqli_connect_error(); //Falls Verbindung nicht aufgebaut werden kann
            exit();
        }


        $_SESSION['bewertung_result'] = null;
        $Bemerkung = $_POST['Bemerkung'];
        $gerichtid = $_POST['gerichtid'];//ID des Gerichts übergeben
        $Admin = $_SESSION['admin'];//Prüfen ob Admin ist
        $Sterne = $_POST['Bewertung'];
        $benutzerid = $_SESSION['id'];

        $datum = date('Y-m-d H:i:s'); //Datum und Uhrzeit wird gesetzt


        $sql = "INSERT INTO bewertungen(bewertungs_id, bemerkung, bewertungszeitpunkt, hervorgehoben, sternebewertung, gericht_id)
                VALUES ('$benutzerid', '$Bemerkung', '$datum', '$Admin', '$Sterne','$gerichtid')";


        mysqli_query($link, $sql);
        $link->commit();
        header('Location: /werbeseite');

    }


public function meinebewertungen(RequestData $rd) {

    $link = connectdb();
    $id = $_SESSION['id'];
    $bewertungen = meinebewertungen($id);

    if (isset($_POST['bewertungsid']))
    {
       $bewertungsid = $_POST['bewertungsid'];
        bewertung_loeschen($bewertungsid);
        header('Location: /meinebewertung');
    }

        return view('Werbeseite.meinebewertungen', ['meinebewertungen' => $bewertungen]);


}

/*public function bewertung_loeschen(){
        $link = connectdb();
        $id = $_SESSION['id'];
        bewertung_loeschen($id);
        return view('Werbeseite.meinebewertungen');

}*/

    public function bewertung_hervorheben()
    {

        header('Location: /bewertung'); //zurück zur anmeldemaske;
    }



}

