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
            <li class="breadcrumb-item active" aria-current="page">Notizie</li>
        </ol>
    </nav>
</div>
@endsection

@section('header_section')
<div class="container">
    <header class="header-section">
        <h1>Notizie</h1>
    </header>
</div>
@endsection


@section('contenuto')
@foreach ($notizie as $notizia)
    <div class="container">
        <div class="container container-notizia">
            <div class="row">
                <div class="col-6">
                    <img src="{{ asset('img/notizie/' . $notizia->foto) }}" class="img-fluid img-thumbnail"></img>
                </div>
                <div class="col-6 container-testo-notizia bg-light d-flex flex-column">
                    <div class="row flex-grow-1">
                        <div class="col-12">
                            <h3 class="text-center">{{$notizia->titolo}}</h3>
                        </div>
                        <div class="col-12">
                            <p>{{$notizia->testo}}</p>
                        </div>
                        <div class="row mt-auto">
                            <div class="col-6 text-center">
                                <a href="{{route('notizia.show', ['id_notizia' => $notizia->id_notizia])}}" class="btn btn-primary">Leggi di più</a>
                            </div>
                            <div class="col-6 text-end">
                                <p class="data">{{$notizia->data}}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection