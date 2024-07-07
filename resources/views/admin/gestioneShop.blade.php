@extends('layouts.master')

@section('title', 'Admin - Gestione rose - FC Bedizzole')

@section('breadcrumb')
<div class="container">
    <nav aria-label="breadcrumb" id="breadcrumb-nav">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Admin</li>
            <li class="breadcrumb-item active" aria-current="page">Gestione Shop</li>
        </ol>
    </nav>
</div>
@endsection

@section('header_section')
<div class="container">
    <header class="header-section">
        <h1>Gestione Shop</h1>
    </header>
</div>
@endsection


@section('contenuto')
<div class="container text-center">
    <div class="container container-gestioneRosa">
        <div class="titolo-squadra">
            <div class="row">
                <div class="col">
                    <a href="{{route('prodotti.create')}}" class="btn btn-success add-news"><iconify-icon
                            icon="carbon:add-filled"></iconify-icon> Aggiungi nuovo prodotto</a>
                </div>
            </div>
        </div>
        <div class="table-giocatori">
            <div class="row header">
                <div class="col">
                    Immagine
                </div>
                <div class="col">
                    Nome del prodotto
                </div>
                <div class="col">
                    Prezzo
                </div>
                <div class="col">
                    Taglie disponibili
                </div>
                <div class="col">
                    Azioni
                </div>
                @foreach ($prodotti as $prodotto)
                                <div class="row align-items-center">
                                    <div class="col">
                                        <img src="{{ asset('img/shop/' . $prodotto->foto) }}"
                                            class="img-fluid img-thumbnail img-gestioneshop">
                                    </div>
                                    <div class="col">
                                        {{ $prodotto->descrizione }}
                                    </div>
                                    <div class="col">
                                        {{ $prodotto->prezzo}} €
                                    </div>
                                    <div class="col">
                                        @php
                                            $taglie = $prodotto->taglie;
                                        @endphp
                                        @foreach($taglie as $taglia)
                                            {{ $taglia->taglia }}
                                        @endforeach
                                    </div>
                                    <div class="col">
                                        <a href="{{route('prodotti.edit', ['prodotti' => $prodotto->id_prodotto ])}}" class="btn btn-light">
                                            <iconify-icon icon="mdi:pencil"></iconify-icon> Modifica
                                        </a>
                                        <a href="eliminaProdotto.php?id={{ $prodotto->id_prodotto }}" class="btn btn-danger">
                                            <iconify-icon icon="bi:trash-fill"></iconify-icon> Elimina
                                        </a>
                                    </div>
                                </div>

                @endforeach

            </div>
        </div>
    </div>
</div>

    @endsection