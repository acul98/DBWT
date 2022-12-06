<?php

public function check(RequestData $rd)
{
    $email = $rd->query['email'] ?? false;
    $password = $rd->query['password'] ?? false;

// Überprüfung Eingabedaten
    $_SESSION['anmeldung_result_message'] = null;
    if (/* erfolgreich */) {
        $_SESSION['anmeldung_ok'] = true;
        $target = $_SESSION['target'];
        header('Location: /' . $target);
    } else {
        $_SESSION['anmeldung_result_message'] =
            'E-Mail oder Passwort falsch';
        header('Location: /anmeldung');
    }
}

?>