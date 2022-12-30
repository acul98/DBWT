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
    <th></th>
    <th>Gericht</th>
    <th>Bemerkung</th>
    <th>Sterne</th>
    <th>Bewertungszeitpunkt</th>


    @foreach($Bewertungsausgabe as $value)
        <tr>
            @if($_SESSION['id']==$value['bewertungs_id'])
            <td>{{$value['name']}}</td>
            <td>{{$value['bemerkung']}}</td>
            <td>{{$value['sternebewertung']}}</td>
            <td>{{$value['bewertungszeitpunk']}}</td>
            <td><button class="loeschenbutton">Löschen</button></td>
            @endif
            @endforeach
        </tr>
</table>
</body>
