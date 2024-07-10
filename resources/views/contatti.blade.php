@extends('layouts.master')

@section('titolo_head', 'Home - FC Bedizzole')

@section('breadcrumb')
<div class="container">
    <nav aria-label="breadcrumb" id="breadcrumb-nav">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href={{ route('home') }}>Home</a></li>
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
        <x-mapbox id="mapId" :zoom=13 :markers="[['lat' => 45.5122527072492, 'long' => 10.4068913812677, 'description' => 'Il nostro centro sportivo']]" :center="['long' => 10.4068913812677, 'lat' => 45.5122527072492]"
            style="height: 500px; width: 100%;" position="relative" />
    </div>

    <div class="row d-flex justify-content-center row-contatti">
        <div class="col-md-4 text-center card-contatto">
            <span class="logos--google-maps"></span>
            <h1>Indirizzo</h1>
            <h4>Via G. Garibaldi, 25081, Bedizzole BS</h4>
        </div>
        <div class="col-md-4 text-center card-contatto">
            <span class="mdi--email-outline"></span>
            <h1>Email</h1>
            <h4>Esempio@gmail.com</h4>
        </div>
        <div class="col-md-4 text-center card-contatto">
            <span class="ic--outline-phone"></span>
            <h1>Telefono</h1>
            <h4>030 333222121</h4>
            <h4>+39 3334445556</h4>
        </div>
    </div>

</div>
@endsection