@php
use Illuminate\Support\Str;
@endphp


@extends('layouts.master')

@section('title', 'Admin - Gestione rose - FC Bedizzole')

@section('right_navbar')
    <li class="nav-item"><a class="nav-link" href="carrello.php"><iconify-icon icon="bi:cart-fill"></iconify-icon>
            Carrello</a></li>
    <li class="nav-item dropdown d-flex me-2">
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
                <li class="breadcrumb-item"><a href="{{route('notizie.index')}}">Notizie</a></li>
                <li class="breadcrumb-item active" aria-current="page">Giornalista</li>
            </ol>
        </nav>
    </div>
@endsection

@section('header_section')
    <div class="container">
        <header class="header-section">
            <h1>Gestione Notizie</h1>
        </header>
    </div>
@endsection


@section('contenuto')
    <div class="container text-center">
            <div class="container container-gestioneRosa">
                </div>
                <div class="table-giocatori">
                    <div class="row header">
                        <div class="col">Titolo</div>
                        <div class="col">Testo</div>
                        <div class="col">Data di creazione</div>
                        <div class="col">Azioni</div>
                    </div>
                    @foreach ($notizie as $notizia)
                        <div class="row">
                            <div class="col">{{ $notizia->titolo }}</div>
                            <div class="col">{{ Str::limit($notizia->testo, 100) }}</div>
                            <div class="col">{{ $notizia->data }}</div>
                            <div class="col">
                                <a href="{{route('notizie.edit', ['notizie' => $notizia->id_notizia])}}"
                                    class="btn btn-light"><iconify-icon icon="mdi:pencil"></iconify-icon> Modifica</a>
                                
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    </div>
@endsection
