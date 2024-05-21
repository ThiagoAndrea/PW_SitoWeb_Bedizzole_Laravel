@extends('layouts.master')

@section('title', 'Modifica giocatore - FC Bedizzole')

@section('left_navbar')
    <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">Squadre</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="giovanissimiU14.php">Giovanissimi U14</a></li>
                <li><a class="dropdown-item" href="esordientiU13.php">Esordienti U13</a></li>
                <li><a class="dropdown-item" href="esordientiU12.php">Esordienti U12</a></li>
                <li><a class="dropdown-item" href="pulciniU11.php">Pulcini U11</a></li>
                <li><a class="dropdown-item" href="pulciniU10.php">Pulcini U10</a></li>
                <li><a class="dropdown-item" href="piccoliAmiciU9.php">Piccoli Amici U9</a></li>
                <li><a class="dropdown-item" href="scuolaCalcio.php">Scuola Calcio</a></li>
            </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="notizie.php">Notizie</a></li>
        <li class="nav-item"><a class="nav-link" href="modulistica.php">Modulistica</a></li>
        <li class="nav-item"><a class="nav-link" href="shop.php">Shop</a></li>
        <li class="nav-item"><a class="nav-link" href="contatti.php">Contatti</a></li>
    </ul>
@endsection


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
            <li class="breadcrumb-item active" aria-current="page">Elimina giocatore</li>
        </ol>
    </nav>
</div>
@endsection


@section('contenuto')

    <div class="container mt-5">

        <div class="row">
            <div class="col text-center">
                 <h2>Elimina il giocatore {{$giocatore->nome}} {{$giocatore->cognome}} dal database </h2>
                </div>
        </div>
        <div class="row mt-3 justify-content-center">
            <div class="col-md-4 text-center riquadro-eliminazione">
                <p>Annulla l'operazione e torna indietro. Il giocatore non verrà eliminato</p>
                <a type="button" class="btn btn-secondary" href="route('admin/giocatori')" >Annulla</a>
            </div>
            <div class="col-md-4 text-center riquadro-eliminazione">
                <p>Il giocatore verrà rimosso in maniera definitiva dal database</p>
               <a href="{{route('giocatore.delete', ['id_giocatore' => $giocatore->id_giocatore])}}" type="button" class="btn btn-danger">Elimina</a>
              
            </div>
        </div>  
    </div>
@endsection