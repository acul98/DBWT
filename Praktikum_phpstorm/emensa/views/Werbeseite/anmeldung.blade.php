<!DOCTYPE html>
<html>
<head>
    <title>Anmeldung</title>
</head>
<body>

<form action="/anmeldung_verifizieren" method="post">
    E-Mail:<br>
    <input type="email" size="40" maxlength="250" name="email" required><br><br>

    Dein Passwort:<br>
    <input type="password" size="40"  maxlength="250" name="password" required><br>

    <input type="submit" value="Abschicken">
</form>
<div>
    @if (isset($msg))
        {{$msg}}
    @endif
</div>
</body>
</html>