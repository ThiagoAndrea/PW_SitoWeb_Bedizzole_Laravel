@extends('layouts.master')

@section('titolo_head', 'Home - FC Bedizzole')

@section('breadcrumb')
<div class="container">
    <nav aria-label="breadcrumb" id="breadcrumb-nav">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href={{route('home')}}>Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Contatti</li>
        </ol>
    </nav>
</div>
@endsection

@section('header_section')
<div class="container">
    <header class="header-section">
        <h1>Contatti</h1>
    </header>
</div>
@endsection


@section('contenuto')
<div class="container">
    <div class="row">
        <h1>Maps</h1>
    </div>
    <div class="row">
        <div class="col-md-4">
            <h1>Indirizzo</h1>
        </div>
        <div class="col-md-4">
            <h1>Email</h1>
        </div>
        <div class="col-md-4">
            <h1>Telefono</h1>
        </div>
    </div>
    <div class="row">
        <h1>Per fare domande o ulteriori informazioni, contattaci!</h1>
        <h3>Compila il form sottostante</h3>
    </div>
</div>
@endsection