<?php
/**
 * Mapping of paths to controllers.
 * Note, that the path only supports one level of directory depth:
 *     /demo is ok,
 *     /demo/subpage will not work as expected
 */

return array(
    '/' => "HomeController@index",
    "/demo" => "DemoController@demo",
    '/dbconnect' => 'DemoController@dbconnect',
    '/debug' => 'HomeController@debug',
    '/error' => 'DemoController@error',
    '/requestdata' => 'DemoController@requestdata',
    '/m4_7a_queryparameter' => 'ExampleController@m4_7a_queryparameter',
    '/m4_7b_kategorie' => 'ExampleController@m4_7b_kategorie',
    '/m4_7c_gerichte' => 'ExampleController@m4_7c_gerichte',
    '/m4_7d_layout' => 'ExampleController@Seitenauswahl_7d',
    '/werbeseite' => 'HomeController@index',
    '/registrierung' => 'AuthController@registrierung',
    '/registrierung_verifizieren' => 'AuthController@registrierung_verifizieren',
    '/anmeldung' => 'AuthController@anmeldung',
    '/anmeldung_verifizieren' => 'AuthController@anmeldung_verifizieren',
    '/abmeldung' => 'AuthController@abmeldung',
    '/bewertung' => 'AuthController@bewertung',
    '/bewertungeintragen' => 'AuthController@bewertungeintragen',
    '/meinebewertungen' => 'AuthController@meinebewertungen',
    '/allebewertungen' => 'hervorhebenController@allebewertungen',
    '/bewertung_hervorheben' => 'AuthController@bewertung_hervorheben',
    '/hervorhebung_loeschen' => 'AuthController@hervorhebung_loeschen',



    // Erstes Beispiel:
    '/m4_6a_queryparameter' => 'ExampleController@m4_6a_queryparameter',
    '/m4' => 'ExampleController@m4_6a_queryparameter',

);