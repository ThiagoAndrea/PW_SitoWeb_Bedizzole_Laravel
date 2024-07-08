@extends('layouts.master')

@section('titolo_head', 'Carrello - FC Bedizzole')

@section('breadcrumb')
<div class="container">
    <nav aria-label="breadcrumb" id="breadcrumb-nav">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('showShop')}}">Shop</a></li>
            <li class="breadcrumb-item active" aria-current="page">Carrello</li>
        </ol>
    </nav>
</div>
@endsection


@section('header_section')
<div class="container">
    <header class="header-section">
        <h1>Carrello</h1>
    </header>
</div>
@endsection

@section('contenuto')
<div class="container text-center">
    <div class="container container-gestioneRosa">
        <div class="table-giocatori">
            <div class="row header">
                <div class="col">
                    Immagine
                </div>
                <div class="col">
                    Nome del prodotto
                </div>
                <div class="col">
                    Taglia
                </div>
                <div class="col">
                    Prezzo
                </div>
                <div class="col">
                    Quantità
                </div>
                <div class="col">
                    Totale
                </div>
                <div class="col">
                    Azioni
                </div>
            </div>
            @foreach($dettagli as $dettaglio)
            <div class="row align-items-center">
                <div class="col">
                    <img src="{{ asset('img/shop/' . $dettaglio->prodotto->foto) }}" class="img-fluid img-thumbnail img-gestioneshop">
                </div>
                <div class="col">
                    {{$dettaglio->prodotto->descrizione}}
                </div>
                <div class="col">
                    {{$dettaglio->taglia->taglia}}
                </div>
                <div class="col">
                    {{$dettaglio->prodotto->prezzo}}
                </div>
                <div class="col">
                    {{$dettaglio->quantita}}
                </div>
                <div class="col">
                    14,00€
                </div>
                <div class="col">
                    <a href="{{route('dettaglio.destroy', ['id_dettaglio'=>$dettaglio->id_dettaglio])}}" class="btn btn-danger"><iconify-icon
                            icon="bi:trash-fill"></iconify-icon> Rimuovi</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    
</div>
@endsection