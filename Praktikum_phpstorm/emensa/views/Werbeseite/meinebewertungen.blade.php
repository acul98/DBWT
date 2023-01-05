<!DOCTYPE html>
<html>
<head>
    <title>Meine Bewertungen</title>
    <link type="text/css" rel="stylesheet" href="/css/bewertung.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<h1>Ihre Bewertungen</h1>
<p>Hier können Sie Ihre Bewertungen sehen und bearbeiten.</p>
<table>
    <th>Gericht</th>
    <th>Bemerkung</th>
    <th>Sterne</th>
    <th>Bewertungszeitpunkt</th>
    <th></th>


    @foreach($meinebewertungen as $value)
        <tr>
            <td>{{$value['name']}}</td>
            <td>{{$value['bemerkung']}}</td>
            <td>{{$value['sternebewertung']}}</td>
            <td>{{$value['bewertungszeitpunkt']}}</td>
            <td>
                <form action="/meinebewertungen" method="POST">
                    <input type="submit" name="loeschen" value="Bewertung löschen">
                </form>
            </td>

            @endforeach
        </tr>
</table>

</body>
