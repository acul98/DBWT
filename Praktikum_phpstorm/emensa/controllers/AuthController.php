<?php
require_once ('../models/benutzer.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../public/index.php');

class AuthController
{

    public function registrierung(RequestData $rd)
    {
        $rrm = $_SESSION['registrierung_result_message'] ?? null;
        return view('Werbeseite.registrierung', ['rrm' => $rrm]);
    }

    function registrierung_verifizieren (RequestData $rd)
    {
        $name = $rd->query['name'] ?? false;
        $email = $rd->query['email'] ?? false;
        $password = $rd->query['password'] ?? false;

        $benutzer_db = db_select_benutzer();

        $salt = 'dbwt';
        $password_userinput = sha1($salt . $password);

        foreach ($benutzer_db as $e) {
            if ($e['name'] != $name && $e['email'] != $email && $e['passwort'] != $password_userinput)
            {
                $_SESSION['registrierung_result_message'] = null;
                $_SESSION['registrierung_ok'] = true;


                $link = connectdb();
                $link->begin_transaction();
                $registrierung = "INSERT INTO benutzer (id,name,email,passwort,admin) VALUES ('$name','$email','$password',0)";
                $resultletzteregistrierung = mysqli_query($link, $registrierung);
                $link->commit();
                mysqli_close($link);


                header('Location: /werbeseite'); //zurück auf die Werbeseite
                logger()->info('Registrierung erfolgreich');
                logger()->info('Weiterleitung auf Hauptseite nach Registrierung');
            }
            else
            {
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


    public function abmeldung() {
        session_destroy();
        header('Location: /werbeseite');
        logger()->info('Abmeldung');
    }


    function anmeldung_verifizieren (RequestData $rd)
    {
        $email = $rd->query['email'] ?? false;
        $password = $rd->query['password'] ?? false;

        $benutzer_db = db_select_benutzer();

        $salt = 'dbwt';
        $password_userinput= sha1($salt . $password);

        foreach ($benutzer_db as $e){

            if($e['email'] === $email){
                if($e['passwort'] === $password_userinput){
                    //counter auf null setzten außer beim admin der darf nicht gesperrt werden, in der db noch ein feld hinzufügen gespert



                      $_SESSION['login_result_message'] = null;
                      $_SESSION['login_ok'] = true;
                      $_SESSION['nutzer'] = $e['name']; //ausgabe des Namens auf der Werbeseite, welcher sich erfolgreich angemeldet hat.

                      $_SESSION['counter']+=1; //der zähler zählt jee erfolgreiche anmeldung eins hoch
                      $counter = $_SESSION['counter'];
                      $email_db = $e['email'];
                      //Datenbank aufbau und ubdate der anzahlanmeldungen in der Datenbank
                      $link = connectdb();
                      //$link->begin_transaction();

                    $id = id_finden($email_db);
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
                    }
                else {
                    $link = connectdb();

                    $letzterfehler = date('Y-m-d H:i:s');
                    $link->begin_transaction();
                    $letzterfehlersetzten = "UPDATE benutzer SET letzterfehler='$letzterfehler' WHERE email = '$email'";
                    $resultletzterfehlersetzten = mysqli_query($link, $letzterfehlersetzten);
                    $link->commit();
                    $_SESSION['login_result_message'] = 'Name oder Passwort falsch';
                    header('Location: /anmeldung'); //zurück zur anmeldemaske
                    logger()->warning('fehlgeschlagene Anmeldung');
                }
                }
            else {
                $_SESSION['login_result_message'] = 'Name oder Passwort falsch';
                header('Location: /anmeldung'); //zurück zur anmeldemaske
                logger()->warning('fehlgeschlagene Anmeldung');
            }
        }
    }
}

