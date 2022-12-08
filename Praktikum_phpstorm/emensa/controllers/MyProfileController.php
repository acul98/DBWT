<?php

class MyProfileController
{
// Route /myprofile
    public function index(RequestData $rd) {
        if (!isset($_SESSION['login_ok'])) {
            $_SESSION['target'] = '/myprofile';
            header('Location: login');
            return;
        }
// Zeige Profildaten an.
    }
}