@extends('layouts.master')

@section('title', 'Admin - Gestione rose - FC Bedizzole')

@section('right_navbar')
    <li class="nav-item"><a class="nav-link" href="carrello.php"><iconify-icon icon="bi:cart-fill"></iconify-icon>
            Carrello</a></li>
    <li class="nav-item dropdown d-flex me-2 active">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAdmin" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">Admin</a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdownAdmin">
            <li><a class="dropdown-item" href="{{route('giocatori.index')}}">Gestione Rose</a></li>
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
                <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Admin</li>
                <li class="breadcrumb-item active" aria-current="page">Gestione Rose</li>
            </ol>
        </nav>
    </div>
@endsection

@section('header_section')
    <div class="container">
        <header class="header-section">
            <h1>Gestione Rose</h1>
        </header>
    </div>
@endsection


@section('contenuto')
    <div class="container text-center">
        @foreach ($squadre as $squadra)
        @if(count($giocatoriPerSquadra[$squadra->id_squadra]) > 0)
            <div class="container container-gestioneRosa">
                <div class="titolo-squadra">
                    <div class="row">
                        <div class="col-8">
                            <h4>{{ $squadra->nome }}</h4>
                        </div>
                        <div class="col-4">
                            <a href="{{route('giocatori.create')}}" class="btn btn-success"><iconify-icon
                                    icon="carbon:add-filled"></iconify-icon> Aggiungi giocatore</a>
                        </div>
                    </div>
                </div>
                <div class="table-giocatori">
                    <div class="row header">
                        <div class="col">Nome</div>
                        <div class="col">Cognome</div>
                        <div class="col">Data di nascita</div>
                        <div class="col">Ruolo</div>
                        <div class="col">Azioni</div>
                    </div>
                    @foreach ($giocatoriPerSquadra[$squadra->id_squadra] as $giocatore)
                        <div class="row">
                            <div class="col">{{ $giocatore->nome }}</div>
                            <div class="col">{{ $giocatore->cognome }}</div>
                            <div class="col">{{ $giocatore->data_di_nascita }}</div>
                            <div class="col">{{ $giocatore->ruolo }}</div>
                            <div class="col">
                                <a href="{{route('giocatori.edit', ['giocatori' => $giocatore->id_giocatore])}}"
                                    class="btn btn-light"><iconify-icon icon="mdi:pencil"></iconify-icon> Modifica</a>
                                <a href="{{route('giocatore.confirmDelete', ['id_giocatore' => $giocatore->id_giocatore])}}"
                                    class="btn btn-danger"><iconify-icon icon="bi:trash-fill"></iconify-icon> Elimina</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
        @endforeach
    </div>
@endsection
