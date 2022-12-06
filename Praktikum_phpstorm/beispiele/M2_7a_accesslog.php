<?php
/**
 * Praktikum DBWT. Autoren:
 * Luca, Kirchhoff, 3531903
 * Elisa, Rofalski, 3541485
 */
//Variablen definieren
$IP = $_SERVER['REMOTE_ADDR'];
$browser = $_SERVER['HTTP_USER_AGENT'];
$timestamp = time();
$datum = date("d.m.Y",$timestamp);
$uhrzeit = date("H:i",$timestamp);

//array $text wird definiert
$text = [
    date("H:i").'Uhrzeit.',
    date ('d.m.Y'),
    $browser, $IP, ];

$datei = fopen("accesslog.txt","a");        //mode a: Es wird ans Ende der Datei geschrieben

foreach($text as $item){                    //$text-Inhalt wird in Datei geschrieben
    fwrite($datei, $item."\n");
}
//close
