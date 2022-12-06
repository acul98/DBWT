<?php
/**
 * Praktikum DBWT. Autoren:
 * Luca, Kirchhoff, 3531903
 * Elisa, Rofalski, 3541485
 */

$famousMeals = [
    1 => ['name' => 'Currywurst mit Pommes',
        'winner' => [2001, 2003, 2007, 2010, 2020]],
    2 => ['name' => 'Hähnchencrossies mit Paprikareis',
        'winner' => [2002, 2004, 2008]],
    3 => ['name' => 'Spaghetti Bolognese',
        'winner' => [2011, 2012, 2017]],
    4 => ['name' => 'Jägerschnitzel mit Pommes',
        'winner' => [2019]]
];


echo '<ol>';
$komma = 0;
foreach ($famousMeals as $gerichte) {
    echo '<li class="puffer">';
    foreach ($gerichte as $jahre) {
        if (is_array($jahre)) {
            $reversed_array = array_reverse($jahre); // Array umdrehen und die Jahre ausgeben
            foreach ($reversed_array as $jahr) {
                echo $jahr;
                if ($komma < sizeof($reversed_array) - 1) { // Nach dem letzten Jahr soll kein Wert mehr ausgegeben werden
                    echo ', '; }
                $komma++; }
            $komma = 0; }
        else {
            echo $jahre . '<br>'; }
    }
    echo '</li>';
}
echo '</ol>';


$zahlen = 0;


foreach ($famousMeals as $gerichte) {           //Gewinnerjahre werden in $gewinnerjahre übergeben
    foreach ($gerichte as $jahre) {
        if (is_array($jahre)) {
            for ($i = 2000; $i < 2023; $i++) {
                if (in_array($i, $jahre)) {
                    $gewinnerjahre[$zahlen] = $i;
                    $zahlen++;
                }
            }
        }
    }
}
echo 'In diesen Jahren gab es keine Gewinner: ';
asort($gewinnerjahre);
for ($i = 2000; $i < 2023; $i++) {              //Jahre werden durchlaufen. Wenn ein Jahr nicht vorkommt wird es ausgegeben
    if (!in_array($i, $gewinnerjahre)) {
        echo $i, ', ';

    }
}

