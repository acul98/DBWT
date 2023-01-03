<!DOCTYPE html>
<html>
<head>
    <title>Gerichte Bewertung</title>
    <link type="text/css" rel="stylesheet" href="/css/bewertung.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<!--<img src="img/titelbild.jpeg">-->
@section('main')
    <h1>Geben Sie Ihre Bewertung ab:</h1>
    <h2 id="speisen">Das zu bewertende Gericht:</h2>


    @foreach($Gerichteausgabe as $value)
        @if( $value['id'] == $_GET['gerichtid'])
            <h2>{{$value['name']}}</h2>
            <br>
            @if($value['bildname'] != NULL)
                <img src="/img/gerichte/{{$value['bildname']}}" style="max-width: 200px; " alt="{{$value['name']}}">

            @else
                <img src="/img/gerichte/00_image_missing.jpg" style="max-width: 200px;" alt="{{$value['name']}}">

            @endif
        @endif

    @endforeach



    <form action="/bewertungeintragen" method="post">
        <br>

        <fieldset>
            <label for="Bemerkung"> Bemerkung: </label>
            <input type="text" id="Bemerkung" name="Bemerkung" value="" minlength="5" maxlength="100" required>
            <br>
            <br>
            <input type="radio" id="4" name="Bewertung" value="1" required>
            <label for="4"> Sehr gut</label>
            <input type="radio" id="3" name="Bewertung" value="2" required>
            <label for="3"> Gut</label>
            <input type="radio" id="2" name="Bewertung" value="3" required>
            <label for="2"> Schlecht</label>
            <input type="radio" id="1" name="Bewertung" value="4" required>
            <label for="1"> Sehr schlecht</label>
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
    <h1 class="bewertungen">Bewertungen</h1>
    <section class="eigenebewertung">
        <a href="/meinebewertungen">Zu meinen Bewertungen</a>
    </section>
    <br>
    <br>
    <table>
        <th>Gericht</th>
        <th>Bemerkung</th>
        <th>Sterne</th>
        <th>Bewertungszeitpunkt</th>

        @foreach($Bewertungsausgabe as $value)
            <tr>
                <td>{{$value['name']}}</td>
                <td>{{$value['bemerkung']}}</td>
                <td>{{$value['sternebewertung']}}</td>
                <td>{{$value['bewertungszeitpunkt']}}</td>


                @endforeach
            </tr>
    </table>
    <br>

</body>
</html>

