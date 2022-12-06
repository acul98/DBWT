<?php
const GET_PARAM_MIN_STARS = 'search_min_stars';
const GET_PARAM_SEARCH_TEXT = 'search_text';


// Sprachauswahl
session_start();

if (!isset($_SESSION ['sprache'])){
    $_SESSION['sprache'] = "de";
}

else if (isset($_GET['sprache']) && $_SESSION['sprache']  != $_GET['sprache'] && !empty($_GET['sprache'])){
    if ($_GET['sprache'] == "de"){
        $_SESSION['sprache'] = "de";
    }
    else if ($_GET['sprache'] == "en"){
        $_SESSION['sprache'] = "en";
    }
}

    require_once "sprachen/" . $_SESSION['sprache'] . ".php";

echo '<a href="?sprache=de">Deutsch</a> | <a href="?sprache=en">English</a>';


/**
 * List of all allergens.
 */
$allergens = [
    11 => 'Gluten',
    12 => 'Krebstiere',
    13 => 'Eier',
    14 => 'Fisch',
    17 => 'Milch'
];

$meal = [
    'name' => 'Süßkartoffeltaschen mit Frischkäse und Kräutern gefüllt',
    'description' => 'Die Süßkartoffeln werden vorsichtig aufgeschnitten und der Frischkäse eingefüllt.',
    'price_intern' => 2.90,
    'price_extern' => 3.90,
    'allergens' => 11, 13,
    'amount' => 42
];

$ratings = [
    [   'text' => 'Die Kartoffel ist einfach klasse. Nur die Fischstäbchen schmecken nach Käse. ',
        'author' => 'Ute U.',
        'stars' => 2 ],
    [   'text' => 'Sehr gut. Immer wieder gerne',
        'author' => 'Gustav G.',
        'stars' => 4 ],
    [   'text' => 'Der Klassiker für den Wochenstart. Frisch wie immer',
        'author' => 'Renate R.',
        'stars' => 4 ],
    [   'text' => 'Kartoffel ist gut. Das Grüne ist mir suspekt.',
        'author' => 'Marta M.',
        'stars' => 3 ]
];


$showRatings = [];
if (!empty($_GET[GET_PARAM_SEARCH_TEXT])){
    $searchTerm = $_GET[GET_PARAM_SEARCH_TEXT];
    foreach ($ratings as $rating) {
        if (stripos($rating['text'], $searchTerm) !== false) { // Aufgabe 3. 4c) strpos unterscheidet zwischen den Schreibweisen ABC und abc, deshalb habe ich dies auf stripos geändert,den stripos findet einen String in einem anderen String unabhängig von der Groß- und Kleinschreibung.
            $showRatings[] = $rating;
        }
    }
} else if (!empty($_GET[GET_PARAM_MIN_STARS])) {
    $minStars = $_GET[GET_PARAM_MIN_STARS];
    foreach ($ratings as $rating) {
        if ($rating['stars'] >= $minStars) {
            $showRatings[] = $rating;
        }
    }

} else {
    $showRatings = $ratings;
}

function calcMeanStars($ratings): float {
    $sum = 0;   // Aufgabe 3  4d, habe die variable $sum von 1 auf null gesetzt.
    foreach ($ratings as $rating) {
        $sum += $rating['stars'] / count($ratings);
    }
    return $sum;
}


//Flop/Top Funktion
function minmax ($ratings) {
    $min= 10;
    $max= 0;
    foreach ($ratings as $rating) {
        $r = $rating['stars'];
        if($r < $min){
            $min = $r;
        }
        if($r > $max){
            $max = $r;
        }
    }
    return array('min' => $min, 'max' => $max);
}


?>
<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="UTF-8"/>
        <title><?php  echo $text['Gericht'] . $meal['name'];  ?></title>
        <style>
            * {
                font-family: Arial, serif;
            }
            .rating {
                color: darkgray;
            }
        </style>
    </head>
    <body>



    <h1> <?php echo $text['Gericht'] . $meal['name']; ?></h1>
        <form method="get">
            <label> <input type="checkbox" name="einblenden" value="einblenden"> <?php echo $text['einblenden']?></label>
            <label> <input type="checkbox" name="ausblenden" value="ausblenden"> <?php echo $text['ausblenden']?></label>
            <input type="submit" name="senden" value="aktualisieren">
        </form>
        <p><?php if(isset($_GET['einblenden']) == 1) { echo $meal['description'];} else{} ?></p>

        <p><?php echo $text['Preise']?><?php echo "Intern:" . number_format($meal['price_intern'], 2, ",", "."). "€"  . "  " . "||" . "  " . "Extern:" . number_format($meal['price_intern'], 2, ",", "."). "€";?> </p>
        <h1><?php echo $text['Bewertung']?> <?php echo "|| Durschnittsbewertung: " . '(' .calcMeanStars($ratings) . ')' ?></h1>
        <form method="get">
            <label for="search_text">Filter:</label>
            <input id="search_text" type="text" name="search_text" value= "<?php  if(isset($_GET['search_text'])){echo $_GET['search_text'];} ?>" >
            <input type="submit" name="search">
            <label> <input type="checkbox" name="top" value="top"> Top</label>
            <label> <input type="checkbox" name="flop" value="flop"> Flop</label>
            <input type="submit" name="senden" value="anzeigen">
        </form>
        <table class="rating">
            <thead>
            <tr>
                <td><?php echo $text['Author']?></td>  <!-- 4a) -->
                <td><?php echo $text['Text'] ?></td>
                <td><?php echo $text['Sterne'] ?></td>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($showRatings as $rating) {
                echo "<tr> <td class='rating_text'>{$rating['author']}</td> <!-- Aufgabe 3. 4a) -->
                       <td class='rating_text'>{$rating['text']}</td>
                      <td class='rating_stars'>{$rating['stars']}</td>
                 </tr>";}
        ?>
            </tbody>
        </table>

        <?php
foreach ($showRatings as $rating) {
switch($rating['stars'])
{
    case ("0"):
        echo "" . '<br>';
        break;
    case ("1"):
        echo "*" . '<br>';
        break;
    case ("2"):
        echo "**" . '<br>';
        break;
    case ("3"):
        echo "***" . '<br>';
        break;
    case ("4"):
        echo "****" . '<br>';
        break;
        case ("5"):
            echo "*****" . '<br>';
    break;
}}
        ?>

        <h1>Im Gericht enthaltene Allergene</h1>
        <?php //Zeile 128-135  Aufgabe 3. 4b)
        echo '<ul>' ;
        foreach ($meal as $element) {
            foreach ($allergens as $key1 => $value1) {
                if ($element === $key1) {
                    echo '<li>' .  "$value1" . '</li>';
                }
            }
        }
        echo '</ul>';
        ?>



<h2><?php echo $text['Ausgabe Top oder Flop']?></h2>

        <table>
            <thead>
            <tr>
                <td><?php echo $text['Author']?></td>
                <td><?php echo $text['Text'] ?></td>
                <td><?php echo $text['Sterne'] ?></td>
            </tr>
            </thead>
            <tbody>
            <?php
            //echo '<h2>' . "Top oder Flop Anzeige" . '</h2>';

            if(isset($_GET['flop']) == 1) {
                foreach ($ratings as $element) {
                    foreach ($element as $key => $value) {
                        $merken = minmax($ratings);
                        if ($merken['min'] == $value) {
                            echo '<tr>'. '<td>' . $element['author'] . "  " . $element['text'] . "  " . $element['stars'] . '</td>'. '</tr>';
                        }
                    }
                }
            }
            elseif(isset($_GET['top']) == 1) {
                foreach ($ratings as $element) {
                    foreach ($element as $key => $value) {
                        $merken = minmax($ratings);
                        if ($merken['max'] == $value) {
                            echo '<tr>'. '<td>' . $element['author'] . "  " . $element['text'] . "  " . $element['stars'] . '</td>' . '</tr>';
                        }
                    }
                }
            }

            ?>
            </tbody>
        </table>
    </body>
</html>

