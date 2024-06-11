@extends('layouts.master')

@section('title', 'Pulcini U10 - FC Bedizzole')


@section('right_navbar')

    <li class="nav-item"><a class="nav-link" href="carrello.php"><iconify-icon icon="bi:cart-fill"></iconify-icon>
            Carrello</a></li>
    <li class="nav-item dropdown d-flex me-2">
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
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Squadre</li>
                <li class="breadcrumb-item active" aria-current="page">{{$squadra->nome}}</li>
            </ol>
        </nav>
    </div>
@endsection


@section('header_section')
    <div class="container">
        <header class="header-section">
            <h1>{{$squadra->nome}}</h1>
        </header>
    </div>
@endsection

@section('contenuto')
    <div class="container">
        <section id="rosa-giocatori">
            <div class="row">

                @foreach ($listaGiocatori as $giocatore)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="immagineProdotto cardGiocatore">
                            <img src="{{ $giocatore->foto }}" class="img-fluid">
                            <h4 class="datiGiocatore">{{ $giocatore->nome }} {{ $giocatore->cognome }}</h4>
                            <ul class="datiNascosti">
                                <li>Nome:<h4>{{ $giocatore->nome }}</h4>
                                </li>
                                <li>Cognome:<h4>{{ $giocatore->cognome }}</h4>
                                </li>
                                <li>Data di nascita:<h4>{{ $giocatore->data_di_nascita }}</h4>
                                </li>
                                <li>Ruolo:<h4>{{ $giocatore->ruolo }}</h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
        </section>
    </div>
@endsection
