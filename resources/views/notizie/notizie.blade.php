@php
    use Carbon\Carbon;
@endphp
@extends('layouts.master')

@section('titolo_head', 'Notizie - FC Bedizzole')

@section('breadcrumb')
<div class="container">
    <nav aria-label="breadcrumb" id="breadcrumb-nav">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href={{ route('home') }}>Home</a></li>
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

<div class="container">
    <div class="container container-ricerca">
        <div class="row justify-content-between">
            @if (isset($_SESSION['logged']) && ($_SESSION['privilegi'] == 1 || $_SESSION['privilegi'] == 2))
                <div class="col-12 col-md-auto d-flex justify-content-start">
                    <a class="btn btn-giornalista" href="{{ route('giornalista.index') }}">Vai alla sezione giornalisti</a>
                </div>
            @endif
            <div class="col-md-3 col-12 col-md-auto d-flex justify-content-end">
                <input type="text" id="searchInput_notizie" class="form-control" placeholder="Cerca...">
            </div>
        </div>
    </div>
</div>

@foreach ($notizie as $notizia)
    <div class="container">
        <div class="container container-notizia">
            <div class="row">
                <div class="col-6">
                    <img src="{{ asset('img/notizie/' . $notizia->foto) }}"
                        class="img-notizieIndex img-fluid img-thumbnail"></img>
                </div>
                <div class="col-6 container-testo-notizia bg-light d-flex flex-column">
                    <div class="row flex-grow-1">
                        <div class="col-12">
                            <h3 class="text-center">{{ $notizia->titolo }}</h3>
                        </div>
                        <div class="col-12">
                            <p>{{ Str::limit($notizia->testo, 500)}}</p>
                        </div>
                        <div class="row mt-auto riga-fondo-notizie">
                            <div class="col-6 text-center">
                                <a href="{{ route('notizia.show', ['id_notizia' => $notizia->id_notizia]) }}"
                                    class="btn btn-primary">Leggi di più</a>
                            </div>
                            <div class="col-6 text-end">
                                <p class="data">{{ Carbon::parse($notizia->data)->format('d-m-Y') }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection