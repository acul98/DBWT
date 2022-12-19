<!DOCTYPE html>
<html>
<head>
    <title>Temperaturrechner</title>
</head>
<body>
<form method="get">
    Celsius:<br>
    <input type="int" size="40" maxlength="250" name="celsius" ><br><br>
    <input type="submit" value="Abschicken">
    <?php
    $celsius = $_GET['celsius'];
    echo '<p>' .  $celsius . " " . "Grad" . " " . "Celsius  ergibt:" . " " . $celsius + 273.15 . " " .  "Kelvin" . '</p>'?>
</form>
<form method="get">
    Kelvin:<br>
    <input type="int" size="40" maxlength="250" name="kelvin" ><br><br>
    <input type="submit" value="Abschicken">
    <?php
    $kelvin = $_GET['kelvin'];
    echo '<p>' .  $kelvin  . " " . "Kelvin  ergibt:" . " " . $kelvin - 273.15 . " " .  "Celsius" . " " . "Grad" . '</p>'?>



</form>
</body>
</html>


