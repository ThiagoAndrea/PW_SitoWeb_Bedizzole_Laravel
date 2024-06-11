@extends('layouts.master')

@section('title', 'Modifica giocatore - FC Bedizzole')

@section('right_navbar')
    <li class="nav-item"><a class="nav-link" href="carrello.php"><iconify-icon icon="bi:cart-fill"></iconify-icon>
            Carrello</a></li>
    <li class="nav-item dropdown d-flex me-2 active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAdmin" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">Admin</a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownAdmin">
            <li><a class="dropdown-item" href="gestioneRose.php">Gestione Rose</a></li>
            <li><a class="dropdown-item" href="gestioneShop.php">Gestione Shop</a></li>
        </ul>
    </li>
    @if ($logged)
        <li class="nav-item"><a class="nav-link" href="#">Benvenuto {{ $loggedName }} </a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('user.logout') }}">Logout</a></li>
    @else
        <li class="nav-item"><a class="nav-link" href="{{ route('user.login') }}">Login</a></li>
    @endif

@endsection

@section('breadcrumb')
    <div class="container">
        <nav aria-label="breadcrumb" id="breadcrumb-nav">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item"><a href="gestioneRose.php">Admin</a></li>
                <li class="breadcrumb-item"><a href="gestioneRose.php"> Gestione Rose</a></li>
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
    <div class="container ">
        <div class="row justify-content-center ">
            <div class="col-md-6 container-aggiungiGiocatore">
                <h5 class="text-center">
                    @if (isset($giocatore->id_giocatore))
                        Modifica il giocatore
                    @else
                        Aggiungi un nuovo giocatore
                    @endif
                </h5>
                @if(isset($giocatore->id_giocatore))
                <form method="get" action="{{route('giocatore.update', ['id_giocatore' => $giocatore->id_giocatore])}}">
                @else
                <form method="post" action="{{route('giocatori.store')}}">
                @endif
                    @csrf
                    <div class="mb-3">
                        <label for="id_squadra" class="form-label">Squadra:</label>
                        @if (isset($giocatore->id_giocatore) && $giocatore != null)
                            <select class="form-select" id="id_squadra" name="id_squadra" required>
                                <option value="" disabled selected>Seleziona una squadra</option>
                                <option value="7" {{ $giocatore->id_squadra == 7 ? 'selected' : '' }}>Giovanissimi U14
                                </option>
                                <option value="6" {{ $giocatore->id_squadra == 6 ? 'selected' : '' }}>Esordienti U13
                                </option>
                                <option value="5" {{ $giocatore->id_squadra == 5 ? 'selected' : '' }}>Esordienti U12
                                </option>
                                <option value="4" {{ $giocatore->id_squadra == 4 ? 'selected' : '' }}>Pulcini U11
                                </option>
                                <option value="3" {{ $giocatore->id_squadra == 3 ? 'selected' : '' }}>Pulcini U10
                                </option>
                                <option value="2" {{ $giocatore->id_squadra == 2 ? 'selected' : '' }}>Piccoli Amici U9
                                </option>
                                <option value="1" {{ $giocatore->id_squadra == 1 ? 'selected' : '' }}>Scuola Calcio
                                </option>
                            @else
                                <select class="form-select" id="id_squadra" name="id_squadra" required>
                                    <option value="" disabled selected>Seleziona una squadra</option>
                                    <option value="7">Giovanissimi U14</option>
                                    <option value="6">Esordienti U13</option>
                                    <option value="5">Esordienti U12</option>
                                    <option value="4">Pulcini U11</option>
                                    <option value="3">Pulcini U10</option>
                                    <option value="2">Piccoli Amici U9</option>
                                    <option value="1">Scuola Calcio</option>
                        @endif
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="nome" class="form-label">Nome:</label>
                                @if (isset($giocatore->id_giocatore) && $giocatore != null)
                                    <input type="text" class="form-control" id="nome" name="nome"
                                        value="{{ $giocatore->nome }}" required>
                                @else
                                    <input type="text" class="form-control" id="nome" name="nome" required>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="cognome" class="form-label">Cognome:</label>
                                @if (isset($giocatore->id_giocatore) && $giocatore != null)
                                    <input type="text" class="form-control" id="cognome" name="cognome"
                                        value="{{ $giocatore->cognome }}" required>
                                @else
                                    <input type="text" class="form-control" id="cognome" name="cognome" required>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="data_di_nascita" class="form-label">Data di Nascita:</label>
                                @if (isset($giocatore->id_giocatore) && $giocatore != null)
                                    <input type="date" class="form-control" id="data_nascita" name="data_di_nascita"
                                        value="{{ $giocatore->data_di_nascita }}" required>
                                @else
                                    <input type="date" class="form-control" id="data_nascita" name="data_di_nascita"
                                        required>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="ruolo" class="form-label">Ruolo:</label>
                                @if (isset($giocatore->id_giocatore) && $giocatore != null)
                                    <select class="form-select" id="ruolo" name="ruolo" required>
                                        <option value="" disabled>Seleziona un ruolo</option>
                                        <option value="Portiere" {{ $giocatore->ruolo == 'Portiere' ? 'selected' : '' }}>
                                            Portiere</option>
                                        <option value="Difensore"
                                            {{ $giocatore->ruolo == 'Difensore' ? 'selected' : '' }}>Difensore</option>
                                        <option value="Centrocampista"
                                            {{ $giocatore->ruolo == 'Centrocampista' ? 'selected' : '' }}>Centrocampista
                                        </option>
                                        <option value="Attaccante"
                                            {{ $giocatore->ruolo == 'Attaccante' ? 'selected' : '' }}>Attaccante</option>
                                    </select>
                                @else
                                    <select class="form-select" id="ruolo" name="ruolo" required>
                                        <option value="" disabled selected>Seleziona un ruolo</option>
                                        <option value="Portiere">Portiere</option>
                                        <option value="Difensore">Difensore</option>
                                        <option value="Centrocampista">Centrocampista</option>
                                        <option value="Attaccante">Attaccante</option>
                                    </select>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto profilo:</label>
                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                    </div>
                    <div class="d-flex justify-content-between">
                        @if(isset($giocatore->id_giocatore) && $giocatore != null)
                            <input type="hidden" name="id" value="{{ $giocatore->id }}">
                            <button type="button" class="btn btn-secondary">Annulla</button>
                            <button type="submit" value="Save" class="btn btn-success">Salva</button>
                        @else
                            <button type="button" class="btn btn-secondary">Annulla</button>
                            <button type="submit" class="btn btn-success">Aggiungi</button>
                        @endif
                    </div>
                </form>
            </div>


        </div>
    </div>

@endsection
