@extends('examples.layout.werbeseite_layout')

@section('head')
    @section('title', 'E-Mensa Werbeseite')
    <link type="text/css" rel="stylesheet" href="/css/werbeseite.css">
@endsection
@section('header')
    <header>
        <input type="checkbox" name="" id="chk1">
        <div><img class="logo" src="img/logoweiß.png" alt="mensalogo"></div>
        <div class="search-box">
            <form>
                <input type="text" name="search" id="srch" placeholder="Search">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <ul>
            <li><a href="#home">Ankündigung</a></li>
            <li><a href="#speisen">Speisen</a></li>
            <li><a href="#Galerie">Galerie</a></li>
            <li><a href="#Kontakt">Kontakt</a></li>
            <li><a href="/registrierung">Registrierung</a></li>
            <li>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
            </li>
        </ul>
        <div class="menu">
            <label for="chk1">
                <i class="fa fa-bars"></i>
            </label>
        </div>
    </header>
@endsection


@section('home')
    <div id="home">
        <img class="titelbild" src="img/titelbild.jpeg">

        <h1 id="ankündigung">Bald gibt es essen auch online!</h1>
        <p>Bestellen Sie zukünftig auch problemlos ihr Frühstück oder Mittagsessen bei uns in der E-Mensa.</p>

        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
            ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
            dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore
            et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum.
            Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit.</p>
    </div>
@endsection

@section('Anmelden')
    <h1 id="anundabmelden">Schon angemeldet ?</h1>
    @if(isset($_SESSION['nutzer']))
        <section style="font-size: 20pt; font-family: Verdana;">
            Sie sind angemeldet als: {{$_SESSION['nutzer']}}
            <br>
            <a href="/abmeldung">Hier</a> klicken, um sich abzumelden.
        </section>
    @else
        <section style="font-size: 20pt; font-family: Verdana;">
            <a href="/anmeldung">Hier</a> klicken, um sich anzumelden.
        </section>
    @endif

@endsection


@section('main')
    <h1 id="speisen">Unsere heutigen Speisen</h1>
    <table>
        <th></th>
        <th>Gericht</th>
        <th>Preis intern</th>
        <th>Preis extern</th>


        @foreach($Gerichteausgabe as $value)
            <tr>
                @if( $_SESSION['login_ok'] == true)
                    @if($value['bildname'] != NULL)
                        <td><img src="/img/gerichte/{{$value['bildname']}}" style="max-width: 80px;"
                                 alt="{{$value['name']}}"></td>
                        <td> {{$value['name']}}</td>
                        <td>{{number_format($value['preis_intern'],2) . '€'}}</td>
                        <td>{{number_format($value['preis_extern'],2) . '€'}}</td>
                        <td><a href="/bewertung?gerichtid={{$value['id']}}">Bewerten</a></td>

                    @else
                        <td><img src="/img/gerichte/00_image_missing.jpg" style="max-width: 80px;"
                                 alt="{{$value['name']}}"></td>
                        <td> {{$value['name']}}</td>
                        <td>{{number_format($value['preis_intern'],2) . '€'}}</td>
                        <td>{{number_format($value['preis_extern'],2) . '€'}}</td>
                        <td><a href="/bewertung?gerichtid={{$value['id']}}">Bewerten</a></td>

                    @endif
                @else
                    @if($value['bildname'] != NULL)
                        <td><img src="/img/gerichte/{{$value['bildname']}}" style="max-width: 80px;"
                                 alt="{{$value['name']}}"></td>
                        <td> {{$value['name']}}</td>
                        <td>{{number_format($value['preis_intern'],2) . '€'}}</td>
                        <td>{{number_format($value['preis_extern'],2) . '€'}}</td>
                        <td><a href="/anmeldung">Zum bewerten bitte Anmelden</a></td>

                    @else
                        <td><img src="/img/gerichte/00_image_missing.jpg" style="max-width: 80px;"
                                 alt="{{$value['name']}}"></td>
                        <td> {{$value['name']}}</td>
                        <td>{{number_format($value['preis_intern'],2) . '€'}}</td>
                        <td>{{number_format($value['preis_extern'],2) . '€'}}</td>
                        <td><a href="/anmeldung">Zum bewerten bitte Anmelden</a></td>
                    @endif
                @endif
                @endforeach
            </tr>
    </table>

    <br>
    <a href="/meinebewertungen">Zu meinen Bewertungen</a>
    <hr>
    <br>
    <a href="/allebewertungen">Zeige alle Bewertungen</a>
    <hr>
    <br>
    <hr>

    <h1>Interesse geweckt? Wir informieren Sie!</h1>
    <form action="#formular" method="post">
        <fieldset>
            <legend>Anmeldung</legend>
            <label>Anrede</label> <br>
            <label for="Herr"><input id="Herr" checked="checked" name="Anrede" type="radio" value="Herr"/> Herr</label>
            <br>
            <label for="Frau"><input id="Frau" name="Anrede" type="radio" value="Frau"/> Frau</label> <br>
            <br>
            <label for="vornameid">Vorname<sup>*</sup></label><br>
            <input id="vornameid" name="vorname" type="text" required/> <br>
            <br>
            <label for="nachnameid">Nachname<sup>*</sup></label><br>
            <input id="nachnameid" name="nachname" type="text" required/> <br>
            <br>
            <label for="emailid"> E-Mail<sup>*</sup></label><br>
            <input id="emailid" name="email" type="email" required/> <br>
            <br>
            <label for="datenschutz">
                <input id="datenschutz" name="info" type="checkbox" required/> Datenschutzhinweis
                gelesen<sup>*</sup></label>
            <br>
            <br>
            <input type="submit" name="senden" value="senden" required/> <br>
            <br>
            <sup>*)</sup> Eingaben sind Pflicht
        </fieldset>
        <br>
        <br>


        @endsection

        @section('Galerie')
            <div class="container">
                <section id="Galerie">
                    <div class="images">
                        <h1>Galerie</h1>
                        <img class="Foto" src="img/Sushi.jpg" alt="Sushi">
                        <img class="Foto" src="img/Pizza.jpg" alt="Pizza">
                        <img class="Foto" src="img/Steak.jpg" alt="Steak">
                        <img class="Foto" src="img/PokeBowl.jpg" alt="Poke Bowl">
                    </div>
                    <hr>
                </section>
            </div>
        @endsection
        @section('footer')
            <footer id="Kontakt">
                <div id="impressum">

                    <div class="section-header">

                        <p class="section-header">Impressum</p>
                    </div>

                    <div class="contact-wrapper">

                        <ul class="contact-list">

                            <li class="list-item"><span class="contact-text name">Elisa Rofalski & Luca Kirchhoff</span>
                            </li>

                            <li class="list-item"><span class="contact-text place">Aachen, DE</span></li>

                            <li class="list-item"><span class="contact-text phone">555-5555</span></li>
                        </ul>

                        <hr>
                        <br>
                        <div class="copyright">&copy; (c) E-Mensa GmbH ALL OF THE RIGHTS RESERVED</div>
                        <br>
                        <br>
                    </div>

                </div>

            </footer>
@endsection