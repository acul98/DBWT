<?php

class AuthController
{

    public function anmeldung(RequestData $rd)
    {
        $msg = $_SESSION['login_result_message'] ?? null;
        return view('Werbeseite.anmeldung', ['msg' => $msg]);
    }

}