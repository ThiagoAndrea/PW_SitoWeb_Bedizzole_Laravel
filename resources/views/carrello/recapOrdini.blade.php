@php
    use Carbon\Carbon;
@endphp

@extends('layouts.master')

@section('title', 'Admin - Visualizza ordini - FC Bedizzole')

@section('breadcrumb')
    <div class="container">
        <nav aria-label="breadcrumb" id="breadcrumb-nav">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Visualizza ordini</li>
            </ol>
        </nav>
    </div>
@endsection

@section('header_section')
    <div class="container">
        <header class="header-section">
            <h1>Ordini effettuati</h1>
        </header>
    </div>
@endsection


@section('contenuto')

    <div class="container text-center">
        <div class="container container-gestioneRosa">
            <div class="table-giocatori">
                <div class="row header">
                    <div class="col">
                        Email
                    </div>
                    <div class="col">
                        Data ordine
                    </div>
                    <div class="col">
                        Dettaglio ordine
                    </div>
                </div>
                @foreach ($ordini as $ordine)
                    <div class="row align-items-center selettore-ricerca">
                        <div class="col">
                            {{ $ordine->utente->email }}
                        </div>
                        <div class="col">
                            {{ Carbon::parse($ordine->data_ordine)->format('d-m-Y') }}
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modal{{ $ordine->id_ordine }}">
                                Visualizza dettagli ordine
                            </button>
                        </div>
                    </div>

                    <!-- Modal per ciascun ordine -->
                    <div class="modal fade" id="modal{{ $ordine->id_ordine }}" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="modal{{ $ordine->id_ordine }}Label" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal{{ $ordine->id_ordine }}Label">Dettagli ordine {{$ordine->utente->nome}} {{$ordine->utente->cognome}}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {!! nl2br(e($ordine->lista_prodotti)) !!}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>



@endsection
