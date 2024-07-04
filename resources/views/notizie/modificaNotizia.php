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
            @if(isset($notizia->id_notizia))
            <li class="breadcrumb-item active" aria-current="page">Modifica notizia</li>
            @else
            <li class="breadcrumb-item active" aria-current="page">Agiungi una nuova notizia</li>
            @endif
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