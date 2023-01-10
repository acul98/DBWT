<?php
require_once('../models/benutzer.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/../public/index.php');
require_once('../models/werbeseitemodel.php');
require_once('../models/bewertung.php');



class hervorhebenController
{

    public function allebewertungen (RequestData $rd) {

        $tabelle = Bewertungsausgabe();
        $bewertungsid = $_GET['eindeutige_id'];
        $hervorheben = bewertung_hervorheben($bewertungsid);
        return view('Werbeseite.allebewertungen', ['Bewertungsausgabe' => $tabelle, 'hervorheben' => $hervorheben]);

    }

}