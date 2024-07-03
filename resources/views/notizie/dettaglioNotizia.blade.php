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
            <li class="breadcrumb-item active" aria-current="page">{{$notizia->titolo}}</li>
        </ol>
    </nav>
</div>
@endsection

@section('header_section')
<div class="container">
    <header class="header-section">
        <h1>{{$notizia->titolo}}</h1>
    </header>
</div>
@endsection

@section('contenuto')

    <?php
    $notizia_precedente = $notizie->where('data', '<', $notizia->data)->sortByDesc('data')->first();
    $notizia_successiva = $notizie->where('data', '>', $notizia->data)->sortBy('data')->first();
    ?>
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <img src="{{ asset('img/notizie/' . $notizia->foto) }}" class="img-thumbnail" style="width: 100%; height: auto; object-fit: cover;">
                <p style="margin-top: 10px; font-size: 20px; text-align: justify;">{{$notizia->testo}}</p>
                <span style="float: right; font-size: 20px;">{{$notizia->data}} <span class="uiw--date"></span></span>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8 d-flex justify-content-between">
                
                <div class="d-flex flex-column">
                    @if ($notizia_precedente)
                    <a href="{{ route('notizia.show', ['id_notizia' => $notizia_precedente->id_notizia]) }}" class="btn btn-primary align-self-start">Notizia Precedente</a>
                    @endif
                </div>
               

                <div class="d-flex flex-column">
                    @if ($notizia_successiva)
                    <a href="{{ route('notizia.show', ['id_notizia' => $notizia_successiva->id_notizia]) }}" class="btn btn-primary align-self-end">Notizia Successiva</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

