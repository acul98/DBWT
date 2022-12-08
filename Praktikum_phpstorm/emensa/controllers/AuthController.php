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

        $password_db = db_select_password_user();
        $email_db= db_select_email_user();

        $salt = 'dbwt';
        $paswword_userinput= sha1($salt . $password);

        $password_check = false;
        $email_check = false;

        foreach ($password_db as $p)
        {
            if($p === $paswword_userinput)
            {
                $password_check = true;
            }
        }

        foreach ($email_db as $e)
        {
            if($e === $email)
            {
                $password_check = true;
            }
        }

        $_SESSION['login_result_message'] = null;
        if ($password_check == true && $email_check == true) {
            $_SESSION['login_ok'] = true;
            $target = $_SESSION['target'];
            header('Location: /' . $target);
        } else {
            $_SESSION['login_result_message'] =
                'Name oder Passwort falsch';
            header('Location: /anmeldung');
        }

    }


}

