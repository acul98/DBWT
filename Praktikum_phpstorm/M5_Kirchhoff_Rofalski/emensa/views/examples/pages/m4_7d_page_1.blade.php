@extends('examples.layout.m4_7d_layout')

@section('title', 'Home')
@section('header')
    <ul>
        <li><a href="#home">Ankündigung</a></li>
        <li><a href="#speisen">Speisen</a></li>
        <li><a href="#zahlen">Zahlen</a></li>
        <li><a href="#formular">Kontakt</a></li>
        <li><a href="#wichtig">Wichtig</a></li>
        <li>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </li>
    </ul>
@endsection

@section('main')
    <h1>Willkommen</h1>
    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
        sed diam nonumy eirmod tempor invidunt ut labore et dolore magna
        aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
        dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus
        est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur
        sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
        dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et
        justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata
        sanctus est Lorem ipsum dolor sit amet.</p>
@endsection

@section('footer')
    <ul class="contact-list">
        <li class="list-item"><span class="contact-text name">Elisa Rofalski & Luca Kirchhoff</span></li>
        <li class="list-item"><span class="contact-text place">Aachen, DE</span></li>
        <li class="list-item"><span class="contact-text phone">555-5555</span></li>
    </ul>
@endsection