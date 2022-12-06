<?php
/**
 * Praktikum DBWT. Autoren:
 * Luca, Kirchhoff, 3531903
 * Elisa, Rofalski, 3541485
 */
$dateiname= file('en.txt');
$search = null;

if(isset($_GET['search'])) {
    $search = $_GET['search'];
}

$search = $_GET['search'] ?? null; //Wurde "search ausgefüllt"?
$found = false;

foreach($dateiname as $inhalt => $wort) {                   //String wird zu Array aus Strings
    $dateiname[$inhalt] = explode(";",$wort);
}

foreach($dateiname as $inhalt => $wort) { //Stimmt das gesuchte Wort mit einem enthaltenen überein? Wenn ja wird Wort ausgegeben
    if($search == $wort[0]){
        $found = true;
        echo $wort[1];
    }
}

if(!$found){
    echo 'Das gesuchte Wort ' . '"'. $search. '"' . ' ist nicht enthalten.';
}
//dateiname schlecht
//besser in neues Array zu schreiben
//Upper Lower mit einbauen