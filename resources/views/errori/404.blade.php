@extends('layouts.master')

@section('titolo_head', 'Errore 404 - FC Bedizzole')

@section('header_section')
    <div class="container">
        <header class="header-section">
        </header>
    </div>

@endsection

@section('contenuto')
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8 text-center">
            <h1>Errore 404</h1>
            <h3>La pagina ricercata non esiste!</h3>
            <div class="mt-4">
                <a class="btn btn-secondary mr-2" role="button" onclick="history.go(-1)">Torna indietro</a>
                <a href="{{ route('home') }}" class="btn btn-primary">Torna alla pagina iniziale</a>
            </div>
        </div>
    </div>
</div>
@endsection
