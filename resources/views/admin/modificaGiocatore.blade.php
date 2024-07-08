@extends('layouts.master')

@section('title', 'Modifica giocatore - FC Bedizzole')

@section('breadcrumb')
    <div class="container">
        <nav aria-label="breadcrumb" id="breadcrumb-nav">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('giocatori.index')}}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{route('giocatori.index')}}"> Gestione Rose</a></li>
                @if (@isset($giocatore->id_giocatore))
                    <li class="breadcrumb-item active" aria-current="page">Modifica giocatore</li>
                @else
                    <li class="breadcrumb-item active" aria-current="page">Aggiungi giocatore</li>
                @endif
            </ol>
        </nav>
    </div>
@endsection

@section('contenuto')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 container-aggiungiGiocatore">
            <h5 class="text-center">
                @if (isset($giocatore->id_giocatore))
                    Modifica il giocatore
                @else
                    Aggiungi un nuovo giocatore
                @endif
            </h5>
            @if(isset($giocatore->id_giocatore))
            <form method="put" action="{{route('giocatore.update', ['id_giocatore' => $giocatore->id_giocatore])}}" enctype="multipart/form-data">
                @method('PUT')
            @else
            <form method="post" action="{{route('giocatori.store')}}" enctype="multipart/form-data">
            @endif
                @csrf
                <div class="mb-3">
                    <label for="id_squadra" class="form-label">Squadra:</label>
                    <select class="form-select" id="id_squadra" name="id_squadra" required>
                        <option value="" disabled selected>Seleziona una squadra</option>
                        <option value="7" {{ isset($giocatore->id_squadra) && $giocatore->id_squadra == 7 ? 'selected' : '' }}>Giovanissimi U14</option>
                        <option value="6" {{ isset($giocatore->id_squadra) && $giocatore->id_squadra == 6 ? 'selected' : '' }}>Esordienti U13</option>
                        <option value="5" {{ isset($giocatore->id_squadra) && $giocatore->id_squadra == 5 ? 'selected' : '' }}>Esordienti U12</option>
                        <option value="4" {{ isset($giocatore->id_squadra) && $giocatore->id_squadra == 4 ? 'selected' : '' }}>Pulcini U11</option>
                        <option value="3" {{ isset($giocatore->id_squadra) && $giocatore->id_squadra == 3 ? 'selected' : '' }}>Pulcini U10</option>
                        <option value="2" {{ isset($giocatore->id_squadra) && $giocatore->id_squadra == 2 ? 'selected' : '' }}>Piccoli Amici U9</option>
                        <option value="1" {{ isset($giocatore->id_squadra) && $giocatore->id_squadra == 1 ? 'selected' : '' }}>Scuola Calcio</option>
                    </select>
                    <span id="squadra-invalida" class="error-span"></span>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="{{ isset($giocatore->nome) ? $giocatore->nome : '' }}" required>
                            <span id="nome-invalido"></span>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="cognome" class="form-label">Cognome:</label>
                            <input type="text" class="form-control" id="cognome" name="cognome" value="{{ isset($giocatore->cognome) ? $giocatore->cognome : '' }}" required>
                            <span id="cognome-invalido"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="data_di_nascita" class="form-label">Data di Nascita:</label>
                            <input type="date" class="form-control" id="data_di_nascita" name="data_di_nascita" value="{{ isset($giocatore->data_di_nascita) ? $giocatore->data_di_nascita : '' }}" required>
                            <span id="data-invalida"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="ruolo" class="form-label">Ruolo:</label>
                            <select class="form-select" id="ruolo" name="ruolo" required>
                                <option value="" disabled>Seleziona un ruolo</option>
                                <option value="Portiere" {{ isset($giocatore->ruolo) && $giocatore->ruolo == 'Portiere' ? 'selected' : '' }}>Portiere</option>
                                <option value="Difensore" {{ isset($giocatore->ruolo) && $giocatore->ruolo == 'Difensore' ? 'selected' : '' }}>Difensore</option>
                                <option value="Centrocampista" {{ isset($giocatore->ruolo) && $giocatore->ruolo == 'Centrocampista' ? 'selected' : '' }}>Centrocampista</option>
                                <option value="Attaccante" {{ isset($giocatore->ruolo) && $giocatore->ruolo == 'Attaccante' ? 'selected' : '' }}>Attaccante</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto profilo:</label>
                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                </div>
                <div class="d-flex justify-content-between">
                    @if(isset($giocatore->id_giocatore) && $giocatore != null)
                        <input type="hidden" name="id" value="{{ $giocatore->id_giocatore}}">
                        <button type="button" class="btn btn-secondary">Annulla</button>
                        <button type="submit" class="btn btn-success" onclick="event.preventDefault(); checkGiocatore()">Salva</button>

                    @else
                        <button type="button" class="btn btn-secondary">Annulla</button>
                        <button type="submit" class="btn btn-success" onclick="event.preventDefault(); checkGiocatore()">Aggiungi</button>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
