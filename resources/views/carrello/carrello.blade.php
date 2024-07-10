@extends('layouts.master')

@section('titolo_head', 'Carrello - FC Bedizzole')

@section('breadcrumb')
    <div class="container">
        <nav aria-label="breadcrumb" id="breadcrumb-nav">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('showShop') }}">Shop</a></li>
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
                @foreach ($dettagli as $dettaglio)
                    <div class="row align-items-center">
                        <div class="col">
                            <img src="{{ asset('img/shop/' . $dettaglio->prodotto->foto) }}"
                                class="img-fluid img-thumbnail img-gestioneshop">
                        </div>
                        <div class="col">
                            {{ $dettaglio->prodotto->descrizione }}
                        </div>
                        <div class="col">
                            {{ $dettaglio->taglia->taglia }}
                        </div>
                        <div class="col">
                            {{ $dettaglio->prodotto->prezzo }} €
                        </div>
                        <div class="col">
                            {{ $dettaglio->quantita }}
                        </div>
                        <div class="col">
                            {{ $prezziDettagli[$dettaglio->id_dettaglio] }} €
                        </div>
                        <div class="col">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $dettaglio->id_dettaglio }}">
                                        <iconify-icon icon="bi:trash-fill"></iconify-icon>Rimuovi
                        </div>

                        <div class="modal fade" id="deleteModal{{ $dettaglio->id_dettaglio }}" tabindex="-1"
                    aria-labelledby="deleteModalLabel{{ $dettaglio->id_dettaglio }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteModalLabel{{ $dettaglio->id_dettaglio }}">
                                    Eliminazione</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Sei sicuro di voler rimouvere  {{ $dettaglio->prodotto->descrizione }} dal carrello?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annulla</button>
                                <form action="{{ route('dettaglio.destroy', ['dettaglio' => $dettaglio->id_dettaglio]) }}"
                                    method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Rimuovi</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                @endforeach
            </div>

            <div class="row" id="row-carrello-pagamento">
                <div class="col-md-12">
                    <h6>Vuoi aggiungere altri prodotti al carrello? <a href="{{ route('showShop') }}" class="btn btn-primary button-back-shop">Torna
                        allo shop</a></h6>
                </div>
            </div>
        </div>
    </div>

    </div>

    <div class="container">
        <div class="contaier text-center d-flex justify-content-end">
            <div class="row" id="row-carrello-pagamento">
                <div class="col">
                    <h5>Il prezzo totale del carrello è: <strong>{{ $prezzoTotale }} €</strong></h5>
                    <form action="{{route('carrello.checkout')}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success button-pagamento">Procedi all'ordine</button>
                </div>
            </div>
        </div>
    </div>
@endsection
