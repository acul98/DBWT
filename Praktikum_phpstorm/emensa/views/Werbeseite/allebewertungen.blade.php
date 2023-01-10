<!DOCTYPE html>
<html>
<head>
    <title>Alle Bewertungen</title>
    <link type="text/css" rel="stylesheet" href="/css/bewertung.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <table>
        <th>Bewertungsnummer</th>
        <th>Gericht</th>
        <th>Bemerkung</th>
        <th>Sterne</th>
        <th>Bewertungszeitpunkt</th>
        <th>hervorheben</th>
        <th>hervorhebung löschen</th>

        @foreach($Bewertungsausgabe as $value)
            <tr>
                <td>{{$value['eindeutige_id']}}</td>
                <td>{{$value['name']}}</td>
                <td>{{$value['bemerkung']}}</td>
                <td>{{$value['sternebewertung']}}</td>
                <td>{{$value['bewertungszeitpunkt']}}</td>
                @if($_SESSION['admin'] == true)
                    <td><a href="/allebewertungen?eindeutige_id={{$value['eindeutige_id']}}">hervorheben</a></td></td>
                    <td><a href="/allebewertungen?eindeutige_id={{$value['eindeutige_id']}}">hervorgebung löschen</a></td></td>
                @else
                @endif
                @endforeach
            </tr>
    </table>
    <br>

</body>
</html>
