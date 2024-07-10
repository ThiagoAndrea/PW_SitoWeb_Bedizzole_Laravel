@extends('layouts.master')

@section('title', 'Admin - Modifica allenatore - FC Bedizzole')

@section('breadcrumb')
    <div class="container">
        <nav aria-label="breadcrumb" id="breadcrumb-nav">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('allenatori.index') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('allenatori.index') }}"> Gestione allenatori</a></li>
                @if (@isset($allenatore->id_prodotto))
                    <li class="breadcrumb-item active" aria-current="page">Modifica allenatore</li>
                @else
                    <li class="breadcrumb-item active" aria-current="page">Aggiungi allenatore</li>
                @endif
            </ol>
        </nav>
    </div>
@endsection


@section('contenuto')
    <div class="row justify-content-center">
        <div class="col-md-6 container-aggiungiGiocatore">
            <h5 class="text-center">
                @if (isset($allenatore->id_allenatore))
                    Modifica allenatore
                @else
                    Aggiungi un nuovo allenatore
                @endif
            </h5>
            @if (isset($allenatore->id_allenatore))
                <form method="post" action="{{ route('allenatori.update', ['allenatori' => $allenatore->id_allenatore]) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                @else
                    <form method="post" action="{{ route('allenatori.store') }}" enctype="multipart/form-data">
            @endif
            @csrf
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-6">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome"
                            value="{{ isset($allenatore->nome) ? $allenatore->nome : '' }}" required>
                        <span id="nome-invalido"></span>
                    </div>
                    <div class="col-md-6">
                        <label for="cognome" class="form-label">Cognome:</label>
                        <input type="text" class="form-control" id="cognome" name="cognome"
                            value="{{ isset($allenatore->cognome) ? $allenatore->cognome : '' }}" required>
                        <span id="cognome-invalido"></span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="squadre" class="form-label">Squadre:</label>
                    <div class="row">
                        @foreach ($squadre as $squadra)
                            <div class="col-md-6">
                                <div class="form-check">
                                    @if (isset($allenatore) && $allenatore->squadre->contains('id_squadra', $squadra->id_squadra))
                                        <input class="form-check-input" type="checkbox" name="squadre[]"
                                            id="squadra{{ $squadra->id_squadra }}" value="{{ $squadra->id_squadra }}"
                                            checked>
                                    @else
                                        <input class="form-check-input" type="checkbox" name="squadre[]"
                                            id="squadra{{ $squadra->id_squadra }}" value="{{ $squadra->id_squadra }}">
                                    @endif
                                    <label class="form-check-label" for="squadra{{ $squadra->id_squadra }}">
                                        {{ $squadra->nome }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                        <span id="squadre-invalide" class="error-span"></span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="data_di_nascita" class="form-label">Data di nascita:</label>
                    <input type="date" class="form-control" id="data_di_nascita" name="data_di_nascita"
                        value="{{ isset($allenatore->data_di_nascita) ? $allenatore->data_di_nascita : '' }}" required>
                    <span id="data-invalida"></span>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto allenatore:</label>
                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                </div>

                @if (isset($allenatore) && $allenatore->foto)
                    <div class="mb-3">
                        <p>Immagine attuale:</p>
                        <img src="{{ isset($allenatore->foto) ? asset('img/allenatori/' . $allenatore->foto) : '' }}"
                            class="img-fluid img-modifica">
                    </div>
                @endif
                <div class="d-flex justify-content-between">
                    @if (isset($allenatore->id_allenatore) && $allenatore != null)
                        <input type="hidden" name="id" value="{{ $allenatore->id_allenatore }}">
                        <button type="button" class="btn btn-secondary" onclick="window.history.back()" >Annulla</button>
                        <button type="submit" class="btn btn-success"
                            onclick="event.preventDefault(); checkAllenatore()">Salva</button>
                    @else
                    <button type="button" class="btn btn-secondary" onclick="window.history.back()" >Annulla</button>
                        <button type="submit" class="btn btn-success"
                            onclick="event.preventDefault(); checkAllenatore()">Aggiungi</button>
                    @endif
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
