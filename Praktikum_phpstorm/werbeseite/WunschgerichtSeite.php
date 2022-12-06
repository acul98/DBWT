<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Werbeseite_Wunschgericht">

    <title>Wunschgericht wählen</title>


</head>

<body>

<form action="wunschgericht.php" method="post">
    <fieldset>
        <legend>Ihr Wunschgericht</legend>
        <label for="nameid">Name<sup>*</sup></label><br>
        <input id="nameid" name="Name" type="text" required/> <br>
        <br>
        <label for="emailid"> E-Mail<sup>*</sup></label><br>
        <input id="emailid" name="email" type="email" required/> <br>
        <br>
        <label for="gerichtnameid">Gericht<sup>*</sup></label><br>
        <input id="gerichtnameid" name="Gerichtname" type="text" required/> <br>
        <br>
        <label for="gerichtbeschreibung">Gerichtbeschreibung<sup>*</sup></label><br>
        <textarea name="gerichtbeschreibung" id="gerichtbeschreibung"></textarea>
        <br>
        <br>

        <input type="submit" name="Abschicken" value="Abschicken" required/> <br>
        <br>
        <sup>*)</sup> Eingaben sind Pflicht
    </fieldset>
</form>

</main>

<footer>
    <p>&copy; 2022 - Luca Kirchhoff & Elisa Rofalski</p>
</footer>

</body>

</html>

<style>
    body{
        margin-top: 100px;
        text-align: center;
        font-family: Arial;
        color: white;
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url(titelbild.jpeg);
        background-position: center center;
        background-size: cover;
        background-attachment: fixed;
        min-height: 100%;
    }

</style>
