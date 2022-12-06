<?php
/**
 * Praktikum DBWT. Autoren:
 * Luca, Kirchhoff, 3531903
 * Elisa, Rofalski, 3541485
 */
?>
<html>
    <head>
        <title>Formular</title>
    </head>
    <body>
        <form method="post" name="formular">
            <input type="text" name="A" size="20" />
            <input type="text" name="B" size="20" />
            <input type="submit" value="Addiere" name='Addiere'/>
            <input type="submit" value="Multipliziere" name='Multipliziere'/>
            <br>
            <?php

            if (isset($_REQUEST['Addiere'])) {
                $summe = $_POST['A'] + $_POST['B'];
                echo $summe;
            } elseif (isset($_REQUEST['Multipliziere'])) {
                $summe = $_POST['A'] * $_POST['B'];
                echo $summe;
            }
            ?>
        </form>
    </body>
</html>