@extends('layouts.master')

@section('title', 'Admin - Gestione allenatori - FC Bedizzole')

@section('breadcrumb')
    <div class="container">
        <nav aria-label="breadcrumb" id="breadcrumb-nav">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Admin</li>
                <li class="breadcrumb-item active" aria-current="page">Gestione allenatori</li>
            </ol>
        </nav>
    </div>
@endsection

@section('header_section')
    <div class="container">
        <header class="header-section">
            <h1>Gestione allenatori</h1>
        </header>
    </div>
@endsection


@section('contenuto')


    <div class="container">
        <div class="container container-ricerca d-flex justify-content-between align-items-center">
            <div class="flex-grow-1 text-center">
                <a href="{{ route('allenatori.create') }}" class="btn btn-success add-news">
                    <iconify-icon icon="carbon:add-filled"></iconify-icon> Aggiungi nuovo allenatore
                </a>
            </div>
            <div class="ml-auto">
                <input type="text" id="searchInput_allenatori" class="form-control" placeholder="Cerca...">
            </div>
        </div>
    </div>



    <div class="container text-center">
        <div class="container container-gestioneRosa">
            <div class="table-giocatori">
                <div class="row header">
                    <div class="col">
                        Nome
                    </div>
                    <div class="col">
                        Cognome
                    </div>
                    <div class="col">
                        Data di nascita
                    </div>
                    <div class="col">
                        Squadre
                    </div>
                    <div class="col">
                        Azioni
                    </div>
                </div>
                @foreach ($allenatori as $allenatore)
                    <div class="row align-items-center selettore-ricerca">
                        <div class="col nome">
                            {{ $allenatore->nome }}
                        </div>
                        <div class="col cognome">
                            {{ $allenatore->cognome }}
                        </div>
                        <div class="col">
                            {{ $allenatore->data_di_nascita }}
                        </div>
                        <div class="col">
                            @foreach ($allenatore->squadre as $squadra)
                                {{ $squadra->nome }}<br>
                            @endforeach
                        </div>
                        <div class="col">
                            <a href="{{ route('allenatori.edit', ['allenatori' => $allenatore->id_allenatore]) }}"
                                class="btn btn-light">
                                <iconify-icon icon="mdi:pencil"></iconify-icon> Modifica
                            </a>
                            <a href="{{ route('allenatori.destroy', ['allenatori' => $allenatore->id_allenatore]) }}"
                                class="btn btn-danger">
                                <iconify-icon icon="bi:trash-fill"></iconify-icon> Elimina
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    

@endsection
