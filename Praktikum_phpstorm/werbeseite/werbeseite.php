<?php
include('formularspeicherung.php');
include ('besuchercounter.php');
session_start();
?>

<!DOCTYPE html>

<!--
- Praktikum DBWT. Autoren:
- Luca, Kirchhoff, 3531903
- Elisa, Rofalski, 3541485
-->

<!--navbar Quelle: https://techmidpoint.com/transparent-responsive-navigation-menus-using-html-and-css/ -->
<!--Besucherzähler Quelle: https://www.ionos.de/digitalguide/websites/webseiten-erstellen/besucherzaehler-selbst-erstellen-so-funktionierts/ -->

<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_name; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<header>
    <input type="checkbox" name="" id="chk1">
    <div><img class="logo" src="logoweiß.png" alt="mensalogo"></div>
    <div class="search-box">
        <form>
            <input type="text" name="search" id="srch" placeholder="Search">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <ul>
        <li><a href="#home">Ankündigung</a></li>
        <li><a href="#speisen">Speisen</a></li>
        <li><a href="#zahlen">Zahlen</a></li>
        <li><a href="#formular">Kontakt</a></li>
        <li><a href="#wichtig">Wichtig</a></li>
        <li>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </li>
    </ul>
    <div class="menu">
        <label for="chk1">
            <i class="fa fa-bars"></i>
        </label>
    </div>
</header>
<img class="titelbild" src="titelbild.jpeg">

<section id="home">
    <h1 id="ankündigung">Bald gibt es essen auch online!</h1>
    <p>Bestellen Sie zukünftig auch problemlos ihr Frühstück oder Mittagsessen bei uns in der E-Mensa.</p>
    <hr>

    <h1 id="speisen">Unsere heutigen Speisen</h1>

    <hr>
    <hr>
    <!-- PHP/SQl Gerichte Ausgabe------------------->
    <?php
    $link = mysqli_connect(
            "localhost",           // Host der Datenbank
            "root",                // Benutzername zur Anmeldung
            "Isenbruch9",          // Passwort
            "emensawerbeseite"     // Auswahl der Datenbanken (bzw. des Schemas)
                                            // optional port der Datenbank
    );

    if (!$link) {
    echo "Verbindung fehlgeschlagen: ", mysqli_connect_error();
    exit();
    }

    $tabelle = "SELECT g.name, preis_extern, preis_intern, group_concat(gha.code) AS acode, group_concat(a.name) AS aname   
                      FROM gericht_hat_allergen gha
                      RIGHT JOIN gericht g ON g.id = gha.gericht_id
                      LEFT JOIN allergen a ON a.code = gha.code
                      GROUP BY g.name ORDER BY 'ASC' LIMIT 5 ;";

    echo '<table>';
    echo '<tr>' . '<th> Gericht </th>'. '<th> Preis intern </th>' . '<th> Preis extern </th>' .'<th> Enthaltene Allergene </th>' . '</tr>';

    $result = mysqli_query($link, $tabelle);
    // mysqli_fetch_assoc = gbt als ergebnis einen assoziatives array zurück. Diese kann man mit der while schelife reihe für reihe durchgehen.
    while ($row = mysqli_fetch_assoc($result)){

        echo "<tr>",
              '<td>' . $row['name'] . '</td>',
              '<td>' . number_format($row['preis_intern'] , 2). '€'.'</td>',
              '<td>' . number_format($row['preis_extern'] , 2) . '€' .'</td>',
              '<td>'. $row['acode'] .  '</td>',
              "</tr>";
    }
    echo "</table>";

    echo '<br>' .'<br>'. '<h4>  Allergenbezeichnung </h4>'.'<br>'.'<br>';
    foreach ($result as $tabelle) {
        if ($tabelle['acode'] != null)
            echo '<li>' . $tabelle['acode'] . ' = ' . $tabelle['aname'] .'<br><br></li>';
    }

    ?>
</section>

<section>
    <h3>Ihr Lieblingsgericht ist nicht dabei? Schreiben Sie uns!</h3>
    <a class="Wunschgericht" href="WunschgerichtSeite.php">Ihr Wunschgericht</a>
</section>

<!-- Galerie -->
<div class="container">
    <section id="Galerie">
        <div class="images">
            <h1>Galerie</h1>
            <img class="Foto" src="img/Sushi.jpg" alt="Sushi">
            <img class="Foto" src="img/Pizza.jpg" alt="Pizza">
            <img class="Foto" src="img/Steak.jpg" alt="Steak">
            <img class="Foto" src="img/PokeBowl.jpg" alt="Poke Bowl">
        </div>
        <hr>
    </section>
</div>

<!-- Formular -->
<section id="formular">
    <h1>Interesse geweckt? Wir informieren Sie!</h1>

    <form action="#formular" method="post">
        <fieldset>
            <legend> Anmeldung</legend>
            <label>Anrede</label> <br>
            <label for="Herr"><input id="Herr" checked="checked" name="Anrede" type="radio" value="Herr"/> Herr</label>
            <br>
            <label for="Frau"><input id="Frau" name="Anrede" type="radio" value="Frau"/> Frau</label> <br>
            <br>
            <label for="vornameid">Vorname<sup>*</sup></label><br>
            <input id="vornameid" name="vorname" type="text" required/> <br>
            <br>
            <label for="nachnameid">Nachname<sup>*</sup></label><br>
            <input id="nachnameid" name="nachname" type="text" required/> <br>
            <br>
            <label for="emailid"> E-Mail<sup>*</sup></label><br>
            <input id="emailid" name="email" type="email" required/> <br>
            <br>
            <label for="datenschutz">
                <input id="datenschutz" name="info" type="checkbox" required/> Datenschutzhinweis gelesen<sup>*</sup></label>
            <br>
            <br>
            <input type="submit" name="senden" value="senden" required/> <br>
            <br>
            <sup>*)</sup> Eingaben sind Pflicht
        </fieldset>
        <br>
        <br>
        <!-- Prüfung der Formulareingabe + counter zur Ausgabe Anzahl der Anmeldungen -->
        <?php
        $counternewsletter=0;
        $_SESSION['ausgabecount'];
        if (isset($_POST['senden'])) {

            //Eingabe Vorname prüfen
            if (!preg_match("/^[a-zA-ZäüöÄÜÖ ]+$/", $vorname)) {
                echo 'Nicht akzeptiertes Zeichen in Ihrer Eingabe' . '<br>';
            }
            else {$counternewsletter++;}

            //Eingabe Nachname prüfen
            if (!preg_match("/^[a-zA-ZäüöÄÜÖ ]+$/", $nachname)) {
                echo 'Nicht akzeptiertes Zeichen in Ihrere Eingabe' . '<br>';
            }
            else {$counternewsletter++;}

            //Eingabe Datenschutzerklärung gelesen prüfen
            if ($info == 0) {
                echo 'Bitte akzeptieren Sie die Datenschutzerklärung' . '<br>';
            }
            else {$counternewsletter++;}

            //Email prüfen (hier wird die Funktion Email aufgeraufen (gespeichert in Formularspeicherung.php)
            if (!checkmail($email)) {
                echo 'Die von Ihnen angegebene Mail Adresse entspricht nicht unseren Vorgaben.' . '<br>';
            }
            else {$counternewsletter++;}

            //Speicherung der Daten in die Textdatei: formular.txt
            $file = fopen("formular.txt","a");
            if (!$file) {
                die('Öffnen fehlgeschlagen');
            }

            foreach($dateiname as $key => $dateiname) {
                $line = "$key,$dateiname\n";
                fwrite($file, $line);
            }
            fclose($file);

if ($counternewsletter==4){
    $_SESSION['ausgabecount'] += 1;
}
        } ?>
    </form>
    <hr>
</section>
<section id="wichtig">
    <h2>Das ist uns wichtig</h2>
    <p>Beste frische saisonale Zutaten <br>
        Ausgewogene abwechsslungsreiche Gerichte <br>
        Sauberkeit
    </p>
    <h3>Wir freuen uns auf Ihren Besuch!</h3>
    <img class="Foto" src="img/Küchenpersonal.jpg" alt="Küchenpersonal">
    <hr>
</section>

<footer>
    <hr>
    <hr>
    <hr>
    <p>
        <!-- Ausgabe der Besucherzahlen-->
        <?php
        $page_name = "E-Mensa Webseite";
        $anzahl_zugriffe = besucher($page_name);
        echo "Sie sind bereits der ", $anzahl_zugriffe, ". Besucher auf dieser Seite!";
        ?>
    </p>
    <br>
        <!-- Ausgabe Anzahl der Gerichte -->
        <?php

        if (!$link) {
            echo "Verbindung fehlgeschlagen: ", mysqli_connect_error();
            exit();
        }
        $gerichte2 = "SELECT id FROM gericht;";

        $result_gerichte2 = mysqli_query($link, $gerichte2);

        if (!$result_gerichte2) {
            echo "Fehler während der Abfrage:  ", mysqli_error($link);
            exit();
        }

        $counter=0;
        while ($row = mysqli_fetch_assoc($result_gerichte2)) {
             $counter++;
        }
echo '<p>' . "Anzahl der Gerichte: " . $counter . '</p>' . '<br>';

        mysqli_close($link);
        ?>

        <!-- Ausgabe Anzahl der Newsletteranmeldungen -->
        <?php
        echo '<p>' . "Newsletteranmeldungen: " . htmlspecialchars($_SESSION['ausgabecount']). '</p>';
        ?>
    <hr>
    <hr>
    <hr>
    <!-- Impressum -->
    <footer>
    <div id="impressum">

        <div class="section-header">

            <p class="section-header">Impressum</p>
        </div>

        <div class="contact-wrapper">

            <ul class="contact-list">

                <li class="list-item"><span class="contact-text name">Elisa Rofalski & Luca Kirchhoff</span></li>

                <li class="list-item"><span class="contact-text place">Aachen, DE</span></li>

                <li class="list-item"><span class="contact-text phone">555-5555</span></li>
            </ul>

            <hr>
            <hr>
            <br>
            <br>
            <div class="copyright">&copy; (c) E-Mensa GmbH ALL OF THE RIGHTS RESERVED</div>
            <br>
            <br>
        </div>

    </div>

</footer>
</body>
</html>

<!------Styling------>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial;
    }

    body {
        text-align: center;
        background-color: #D8DCE4;
    }

    p {
        font-size: 20pt;
    }

    section #home {
        height: 100vh;
    }

    img.titelbild {
        width: 100%;
        height: 100vh;
    }

    #home h1 {
        margin-top: 100px;
        margin-bottom: 20px;
        font-size: 40pt;
    }

    h1 {
        font-size: 60pt;
        font-family: Verdana;
    }

    h2 {
        font-size: 40pt;
        font-family: Verdana;
    }

    h3 {
        font-size: 20pt;
        font-family: Verdana;
    }

    hr {
        background-color: black;
        margin: 20px;
    }

    header {
        width: 100%;
        height: 100px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: fixed;
        z-index: 99;
        box-shadow: 0 0 10px #000;
        background: rgba(0, 0, 0, 0.5);
    }

    ul li {
        list-style: none;
    }

    #chk1 {
        display: none;
    }

    i {
        color: #fff;
        cursor: pointer;
    }

    header .logo {
        flex: 1;
        margin-left: 50px;
        text-transform: uppercase;
        font-size: 15px;
    }

    header .search-box {
        flex: 1;
        position: relative;
    }

    .search-box input {
        width: 100%;
        height: 40px;
        border: none;
        outline: none;
        background: #f2f2f2;
        border-radius: 30px;
        color: gray;
        font-size: 16px;
        padding-left: 5px;
        padding-right: 40px;
        text-align: center;

    }

    .search-box button {
        flex: 1;
        cursor: pointer;
        width: 40px;
        height: 40px;
        border-radius: 30px;
        border: none;
        position: absolute;
        top: 0;
        right: 0;
        transform: scale(0.9);
        background: green;
        color: #fff;
    }

    header ul {
        flex: 2;
        display: flex;
        justify-content: space-evenly;
    }

    header ul li {
        list-style: none;
    }

    header ul li a {
        text-decoration: none;
        color: #fff;
        font-weight: 400;
        text-transform: uppercase;
        padding: 10px 15px;
    }

    header ul li a:hover {
        border-bottom: 2px solid cadetblue;
    }

    header .menu {
        font-size: 2.5em;
        display: none;
    }

    table {
        margin-left: auto;
        margin-right: auto;
    }

    table, th, td {
        border: thin solid;
        border-collapse: collapse
    }

    caption {
        text-align: left;
    }

    td, th {

        font-size: 20pt;
    }

    #formular h1 {
        font-size: 40pt;
        margin-top: 20px;
    }

    form {
        margin: 40px;
    }

    section {
        margin: 100px;
    }
    a {
        color: white;
        font-family: Arial;
        text-transform: uppercase;
        padding: 25px;
    }


    .Wunschgericht {
        display: inline-block;
        width: 250px;
        height: 75px;
        border-radius: 3px;
        transition: ease-out 0.3s;
        font-size: 12pt;
        font-weight: 700;
        border: 3px solid white;
        position: relative;
        z-index: 1;
        background-color: #555555;
        margin-bottom: 2%;
        margin-top: 2%;
    }

    .Wunschgericht:hover {

        cursor: pointer;
    }

    .Wunschgericht:before {
        color: #555555;
        transition: 0.5s all ease;
        position: absolute;
        top: 0;
        left: 50%;
        right: 50%;
        bottom: 0;
        opacity: 0;
        content: "";
        background-color: white;

    }

    .Wunschgericht:hover:before {
        transition: 0.5s all ease;
        left: 0;
        right: 0;
        opacity: 1;
        z-index: -1;
    }

    /** Galerie **/

    .images img {
        width: 300px;
        cursor: pointer;
        transition: 0.5s all ease;
        margin: 10px;
    }

    .images img:hover {
        transform: scale(0.98);
    }


    /*footer*/
    #impressum {
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
    }

    .section-header {
        text-align: center;
        margin: 0 auto;
        padding: 40px 0;
        font: 300 60px 'Oswald', sans-serif;
        color: #fff;
        text-transform: uppercase;
        letter-spacing: 6px;
    }

    .contact-wrapper {

        margin: 0 auto;
        padding: 20px;
        position: relative;
        max-width: 1200px;

    }

    /* Location, Phone*/
    .contact-list {
        text-align: center;
        list-style-type: none;
        padding-right: 20px;
    }

    .list-item {
        line-height: 3;
        color: #aaa;
    }

    .contact-text {
        font: 300 18px 'Lato', sans-serif;
        letter-spacing: 1.9px;
        color: #bbb;
    }

    .contact-text a {
        color: #bbb;
        text-decoration: none;
        transition-duration: 0.2s;
    }

    .contact-text a:hover {
        color: #fff;
        text-decoration: none;
    }

    .copyright {
        font: 200 14px 'Oswald', sans-serif;
        color: #555;
        letter-spacing: 1px;
        text-align: center;
    }

    hr {
        border-color: rgba(255, 255, 255, .6);
    }


    /*Media Query*/
    @media (max-width: 1000px) {
        .search-box button {
            position: absolute;
        }

        header ul {
            position: fixed;
            top: 100px;
            right: -100%;
            background: rgba(0, 0, 0, 0.5);
            height: calc(100vh - 100px);
            width: 50%;
            flex-direction: column;
            align-items: center;
            transition: right 0.5s linear;
        }

        header .menu {
            display: block;
            width: 100px;
            text-align: center;
        }

        #chk1:checked ~ ul {
            right: 0;

        }

        .images img {
            width: 200px;
        }
    }

    @media (max-width: 600px) {
        .images img {
            width: 150px;
        }

        img.Foto {
            width: 300px;
        }
    }

</style>
