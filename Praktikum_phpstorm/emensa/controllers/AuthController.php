<?php
require_once ('../models/benutzer.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/../public/index.php');


class AuthController
{

    public function anmeldung(RequestData $rd)
    {
        $msg = $_SESSION['login_result_message'] ?? null;
        return view('Werbeseite.anmeldung', ['msg' => $msg]);
    }


    public function abmeldung() {
        session_destroy();
        //logger()->info('Abmeldung um diese Zeit: ' . date('d-m-Y h:i:s a', time()));
        header('Location: /werbeseite');
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
                      //Datenbank aufbau und ubdate der anzahlanmeldungen in der Datenbank
                      $link = connectdb();
                      $link->begin_transaction();
                      $anzahlanmeldungensetzten = "UPDATE benutzer SET anzahlanmeldungen='$counter' WHERE email = '$email'";
                      $resultanzahlanmeldungensetzten = mysqli_query($link, $anzahlanmeldungensetzten);
                      $link->commit();

                      $letzteanmeldung = date('Y-m-d H:i:s');
                      $link->begin_transaction();
                      $letzteanmeldungsetzten = "UPDATE benutzer SET letzteanmeldung='$letzteanmeldung' WHERE email = '$email'";
                      $resultletzteanmeldungsetzten = mysqli_query($link, $letzteanmeldungsetzten);
                      $link->commit();
                      mysqli_close($link);


                      header('Location: /werbeseite'); //zurück auf die Werbeseite
                      log()->info('An- und Abmeldung');
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
                }
                }
            else {
                $_SESSION['login_result_message'] = 'Name oder Passwort falsch';
                header('Location: /anmeldung'); //zurück zur anmeldemaske
            }
        }
    }
}

