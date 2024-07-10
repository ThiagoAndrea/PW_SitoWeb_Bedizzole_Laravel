@extends('layouts.master')

@section('title', 'Admin - Gestione rose - FC Bedizzole')

@section('breadcrumb')
    <div class="container">
        <nav aria-label="breadcrumb" id="breadcrumb-nav">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
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

    <div class="container">
        <div class="container container-ricerca d-flex justify-content-between align-items-center">
            <div class="flex-grow-1 text-center">
                <a href="{{ route('prodotti.create') }}" class="btn btn-success add-news">
                    <iconify-icon icon="carbon:add-filled"></iconify-icon> Aggiungi nuovo prodotto
                </a>
            </div>
            <div class="ml-auto">
                <input type="text" id="searchInput_prodotti" class="form-control" placeholder="Cerca...">
            </div>
        </div>
    </div>

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
                        Prezzo
                    </div>
                    <div class="col">
                        Taglie disponibili
                    </div>
                    <div class="col">
                        Azioni
                    </div>
                </div>
                @foreach ($prodotti as $prodotto)
                    <div class="row align-items-center selettore-ricerca">
                        <div class="col">
                            <img src="{{ asset('img/shop/' . $prodotto->foto) }}"
                                class="img-fluid img-thumbnail img-gestioneshop">
                        </div>
                        <div class="col descrizione">
                            {{ $prodotto->descrizione }}
                        </div>
                        <div class="col">
                            {{ $prodotto->prezzo }} €
                        </div>
                        <div class="col">
                            @php
                                $taglie = $prodotto->taglie;
                            @endphp
                            @foreach ($taglie as $taglia)
                                {{ $taglia->taglia }}
                            @endforeach
                        </div>
                        <div class="col">
                            <a href="{{ route('prodotti.edit', ['prodotti' => $prodotto->id_prodotto]) }}"
                                class="btn btn-light">
                                <iconify-icon icon="mdi:pencil"></iconify-icon> Modifica
                            </a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $prodotto->id_prodotto }}">
                            <iconify-icon icon="bi:trash-fill"></iconify-icon>Elimina
                        </div>

                        <div class="modal fade" id="deleteModal{{ $prodotto->id_prodotto }}" tabindex="-1"
                            aria-labelledby="deleteModalLabel{{ $prodotto->id_prodotto }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="deleteModalLabel{{ $prodotto->id_prodotto }}">
                                            Eliminazione</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Sei sicuro di voler eliminare il prodotto {{ $prodotto->descrizione }}?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annulla</button>
                                        <form
                                            action="{{ route('prodotti.destroy', ['prodotti' => $prodotto->id_prodotto]) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Elimina</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    </div>

@endsection
