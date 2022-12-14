@extends('examples.layout.m4_7d_layout')

@section('title', 'Hauptseite')
@section('header')
    <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#main">Main</a></li>
        <li><a href="#footer">footer</a></li>

    </ul>
@endsection

@section('main')
    <h1>Lorem Ipsum</h1>
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
    <ul>
        <li>Roger Federer</li>
        <li>Spanien</li>
        <li>555-5555</li>
    </ul>
@endsection
