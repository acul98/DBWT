<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/gericht.php');
require_once('../models/werbeseitemodel.php');
/* Datei: controllers/HomeController.php */
class HomeController
{

    
    public function debug(RequestData $request) {
        return view('debug');
    }

    public function index(RequestData $request) {
        //  return view('home', ['rd' => $request ]);

        $data = Gerichteausgabe();
        return view('Werbeseite.werbeseite_page', ['Gerichteausgabe' =>$data]);
    }

}