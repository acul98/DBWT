<!DOCTYPE html>
<html>
<head>
    <title>Registrierung</title>
</head>
<body>


<form action="/registrierung_verifizieren" method="post">

    Name:<br>
    <input type="name" size="40" maxlength="250" name="name" required><br><br>

    E-Mail:<br>
    <input type="email" size="40" maxlength="250" name="email" required><br><br>

    Dein Passwort:<br>
    <input type="password" size="40"  maxlength="250" name="password" required><br>

    <input type="submit" value="Abschicken">
</form>

<div>
    @if (isset($rrm))
        {{$rrm}}
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