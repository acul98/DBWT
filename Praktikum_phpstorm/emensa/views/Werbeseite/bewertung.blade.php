<!DOCTYPE html>
<html>
<head>
    <title>Gerichte Bewertung</title>
</head>
<body>
<!--<img src="img/titelbild.jpeg">-->

<form action="/bewertungeintragen" method="post">
<br>

        <h2>Geben Sie Ihre Bewertung ab:</h2>

        <fieldset>
            <label for="Bemerkung"> Bemerkung </label>
            <input type="text" id="Bemerkung" name="Bemerkung" value="" minlength="5" maxlength="100" required>
            <br>
            <br>
            <input type="radio" id="1" name="Bewertung" value="1" required>
            <label for="1"> Sehr gut</label>
            <input type="radio" id="2" name="Bewertung" value="2" required>
            <label for="2"> Gut</label>
            <input type="radio" id="3" name="Bewertung" value="3" required>
            <label for="3"> Schlecht</label>
            <input type="radio" id="4" name="Bewertung" value="4" required>
            <label for="4"> Sehr schlecht</label>
            <input type="hidden" name="gerichtid" value="{{$_GET['gerichtid']}}">
            <br>
            <br>
            <input type="submit" value="Absenden" name="Absenden">
        </fieldset>

</form>



<div>
    @if (isset($br))
        {{$br}}
    @endif
</div>
</body>
</html>

<style>
    img{
        width: 100%;
        height: 100vh;
    }
    body{
        margin-top: 100px;
        text-align: center;
        font-family: Arial;
        color: white;
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7));
        background-position: center center;
        background-size: cover;
        background-attachment: fixed;
        min-height: 100%;
    }

</style>