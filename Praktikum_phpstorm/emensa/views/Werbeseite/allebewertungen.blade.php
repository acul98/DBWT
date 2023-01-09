<!DOCTYPE html>
<html>
<head>
    <title>Alle Bewertungen</title>
    <link type="text/css" rel="stylesheet" href="/css/bewertung.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <table>
        <th>Gericht</th>
        <th>Bemerkung</th>
        <th>Sterne</th>
        <th>Bewertungszeitpunkt</th>
        <th>hervorheben</th>

        @foreach($Bewertungsausgabe as $value)
            <tr>
                <td>{{$value['name']}}</td>
                <td>{{$value['bemerkung']}}</td>
                <td>{{$value['sternebewertung']}}</td>
                <td>{{$value['bewertungszeitpunkt']}}</td>
                @if($_SESSION['admin'] == true)
                    <td>
                        <form action="bewertung_hervorheben" method="POST">
                            <input type="submit" name="hervorheben" value="hervorheben">
                        </form>
                        <form action="bewertung_hervorheben" method="POST">
                            <input type="submit" name="hervorheben abwaehlen" value="hervorheben abwählen">
                        </form>
                    </td>
                @else
                @endif
                @endforeach
            </tr>
    </table>
    <br>

</body>
</html>
