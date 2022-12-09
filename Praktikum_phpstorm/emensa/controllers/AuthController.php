<?php
require_once ('../models/benutzer.php');


class AuthController
{

    public function anmeldung(RequestData $rd)
    {
        $msg = $_SESSION['login_result_message'] ?? null;
        return view('Werbeseite.anmeldung', ['msg' => $msg]);
    }

    function check (RequestData $rd)
    {
        $email = $rd->query['email'] ?? false;
        $password = $rd->query['password'] ?? false;

        $benutzer_db = db_select_benutzer();

        /*$password_db = db_select_password_user();
        $email_db= db_select_email_user();*/

        $salt = 'dbwt';
        $password_userinput= sha1($salt . $password);

        $password_check = false;
        $email_check = false;


        foreach ($benutzer_db as $e){
            if($e['email'] === $email){
                if($e['passwort'] === $password_userinput){
                    //counter auf null setzten außer beim admin der darf nicht gesperrt werden, in der db noch ein feld hinzufügen gespert
                      $_SESSION['login_result_message'] = null;
                      $_SESSION['login_ok'] = true;
                      header('Location: /werbeseite');
                    }
                }
            else {
                //counter +1
                $_SESSION['login_result_message'] = 'Name oder Passwort falsch';
                header('Location: /anmeldung');
            }
        }
    }
/*
        foreach ($email_db as $e)
        {
            if($e === $email)
            {
                $password_check = true;

                foreach ($password_db as $p)
                {
                    if($p === $paswword_userinput)
                    {
                        $password_check = true;
                    }
                }
            }
        }



        $_SESSION['login_result_message'] = null;
        if ($password_check == true && $email_check == true) {
            $_SESSION['login_ok'] = true;

            header('Location: /werbeseite');
        } else {
            $_SESSION['login_result_message'] =
                'Name oder Passwort falsch';
            header('Location: /anmeldung');
        }

    }
*/


}

