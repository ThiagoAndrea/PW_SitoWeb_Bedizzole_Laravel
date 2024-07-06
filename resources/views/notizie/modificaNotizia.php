@extends('layouts.master')

@section('titolo_head', 'Notizie - FC Bedizzole')

@section('right_navbar')

<li class="nav-item"><a class="nav-link" href="carrello.php"><iconify-icon icon="bi:cart-fill"></iconify-icon> Carrello</a></li>
                        <li class="nav-item dropdown d-flex me-2">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAdmin" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Admin</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownAdmin">
                                <li><a class="dropdown-item" href="{{route('giocatori.index')}}">Gestione Rose</a></li>
                                <li><a class="dropdown-item" href="gestioneShop.php">Gestione Shop</a></li>
                            </ul>
                        </li>
@if($logged)
<li class="nav-item"><a class="nav-link" href="#">Benvenuto {{$loggedName}} </a></li>
<li class="nav-item"><a class="nav-link" href="{{route('user.logout')}}">Logout</a></li>
@else
<li class="nav-item"><a class="nav-link" href="{{route('user.login')}}">Login</a></li>
@endif      
@endsection

@section('breadcrumb')
<div class="container">
    <nav aria-label="breadcrumb" id="breadcrumb-nav">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href={{route('home')}}>Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('notizie.index')}}">Notizie</a></li>
            <li class="breadcrumb-item"><a href="{{route('giornalista.index')}}">Giornalista</a></li>
            @if(isset($notizia->id_notizia))
            <li class="breadcrumb-item active" aria-current="page">Modifica notizia</li>
            @else
            <li class="breadcrumb-item active" aria-current="page">Agiungi una nuova notizia</li>
            @endif
        </ol>
    </nav>
</div>
@endsection

@section('contenuto')
<div class="row justify-content-center">
        <div class="col-md-6 container-aggiungiGiocatore">
            <h5 class="text-center">
                @if (isset($notizia->id_notizia))
                    Modifica la notizia
                @else
                    Aggiungi una nuova notizia
                @endif
            </h5>
            @if(isset($notizia->id_notizia))
            <form method="put" action="{{route('notizie.update', ['notizie' => $notizia->id_notizia])}}" enctype="multipart/form-data">
                @method('PUT')
            @else
            <form method="post" action="{{route('notizie.store')}}" enctype="multipart/form-data">
            @endif
                @csrf
                <div class="mb-3">
                    <label for="titolo" class="form-label">Titolo:</label>
                    <input type="text" class="form-control" id="titolo" name="titolo" value="{{ isset($notizia->titolo) ? $notizia->titolo : '' }}" required>
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