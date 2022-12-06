<?php
/**
 * Praktikum DBWT. Autoren:
 * Luca, Kirchhoff, 3531903
 * Elisa, Rofalski, 3541485
 */
/**
$Gerichte= [
    1 => ['name' => 'Poke Bowl',
        'preise' => ["4,50", "8,00"]],
    2 => ['name' => 'Sushi',
        'preise' => ["6,00", "10,00"]],
    3 => ['name' => 'Pizza',
        'preise' => ["3,00", "5,50"]],
    4 => ['name' => 'Rinderfilet',
        'preise' => ["8,80", "12,50"]],
];


echo '<ol>';
foreach ($Gerichte as $gericht) {
    echo '<li class="item">'. $gericht['name'] . '<br>';
    foreach ($gericht['preise'] as $preis) {
        echo 'Preis:'. ' '. $preis . ' ';
    }
    echo '</li>';

    echo '</ol>';
    }
 */
class HTML {

    const CRLF = "\r\n"; //return and new line
    const colClassName = '_col_';

    /*
    * Erstellt HTML-Code für eine Tabelle mit Werten
    * $name = className für table
    * $titleArr = array('Spaltenname1','Spaltenname2',..)
    * $dataArr = array(
    *    array('WertZeile1Spalte1','WertZeile1Spalte2',..)
    *    array('WertZeile2Spalte1','WertZeile2Spalte2',..)
    *
    * dataArr = array(
    *   'spalte1' => 'spalte2',
    * )
    */
    public static function Table($name,array $titleArr,array $dataArr) {
        $cn = self::colClassName; //referenziert Klasse
        $html = '<table class="'.$name.'">'.self::CRLF.'<tr>';
        foreach($titleArr as $i => $title) {
            $html .= '<th class="'.$cn.$i.'">'.$title.'</th>';  //Spaltenueberschrift
        }
        $html .= '</tr>'.self::CRLF; //table rows
        if(! empty($dataArr)) {
            foreach($dataArr as $k => $subArr) {
                $html .= '<tr>'.self::CRLF;
                if(is_array($subArr)) {
                    foreach($subArr as $i => $colValue) {
                        $html .= '<td class="'.$cn.$i.'">'.$colValue.'</td>'; //Table data wird übernommen wennn vorhanden
                    }
                }
                else {
                    $html .= '<td class="'.$cn.'0">'.$k.'</td><td class="'.$cn.'1">'.$subArr.'</td>'; //Sonst endet Table
                }
                $html .= '</tr>'.self::CRLF;
            }
        }
        $html .= '</table>'.self::CRLF;
        return $html;
    }
}

$tab = array(
    ['gericht' => 'Sushi', 'preis_intern' => '7,00€', 'preis_extern' => '10,50€' ],
    ['gericht' => 'Pizza', 'preis_intern' => '3,50€', 'preis_extern' => ' 5,50€' ],
    ['gericht' => 'Filetsteak', 'preis_intern' => '8,00€', 'preis_extern' => '12,00€'],
    ['gericht' => 'Poke Bowl', 'preis_intern' => '5,50€', 'preis_extern' => ' 8,00€'],

);

?>
