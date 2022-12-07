<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/../models/kategorie.php');
require_once ('../models/gericht.php');
require_once ('../models/kategorie.php');
class ExampleController



{
    public function m4_7a_queryparameter(RequestData $rd)
    {
        $name = $rd->query['name'] ?? 'E-Mensa Werbeseite';  /* hat $name = $rd->query['name'] einen Wert/Imhalt wird E-Mensa Werbeseite ignoriert ansonsten $name= E-Mensa Werbeseite */
        return view('examples.m4_7a_queryparameter', [
            'name' => $name
        ]);
    }

    public function m4_7b_kategorie(RequestData $rd)
    {
        $kategorie = db_kategorie_select_all();
        return view('examples.m4_7b_kategorie', [
            'kategorie'=> $kategorie
        ]);
    }

    public function m4_7c_gerichte(RequestData $rd)
    {
        $gerichte = db_gericht_select_all2();
        return view('examples.m4_7c_gerichte', [
            'gerichte'=> $gerichte
        ]);
    }

    public function m4_6a_queryparameter(RequestData $rd) {
        /*
           Wenn Sie hier landen:
           bearbeiten Sie diese Action,
           so dass Sie die Aufgabe löst
        */

        return view('notimplemented', [
            'request'=>$rd,
            'url' => 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}"
        ]);
    }

    public function Seitenauswahl_7d (RequestData $no)
    {
        $seite = $no -> getData()['no'];

        if($seite == 2) {
        return view('examples.pages.m4_7d_page_2', [
        ]);
        }
        else {
            return view('examples.pages.m4_7d_page_1', [
            ]);
        }
    }

    public function Werbeseite_Gerichte(RequestData $data) {

        return view('examples.Werbeseite.werbeseite_page', []);
    }


    public function anmeldung(RequestData $data) {

        return view('Werbeseite.anmeldung', []);
    }


}