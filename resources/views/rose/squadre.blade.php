@extends('layouts.master')

@section('title', 'Pulcini U10 - FC Bedizzole')

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
                            <img src="{{ asset('img/giocatori/' . $giocatore->foto) }}" class="img-fluid">
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
                @foreach ($listaAllenatori as $allenatore)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="immagineProdotto cardAllenatore">
                            <img src="{{ asset('img/allenatore/' . $allenatore->foto) }}" class="img-fluid">
                            <h4 class="datiGiocatore">{{ $allenatore->nome }} {{ $allenatore->cognome }}</h4>
                            <ul class="datiNascosti">
                                <li>Nome:<h4>{{ $allenatore->nome }}</h4>
                                </li>
                                <li>Cognome:<h4>{{ $allenatore->cognome }}</h4>
                                </li>
                                <li>Data di nascita:<h4>{{ $allenatore->data_di_nascita }}</h4>
                                </li>
                                <li>Ruolo:<h4>Allenatore</h4>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
        </section>
    </div>
@endsection
