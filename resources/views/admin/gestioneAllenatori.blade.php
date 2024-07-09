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

<div class="container">
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
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteModal{{ $allenatore->id_allenatore }}">
                            <iconify-icon icon="bi:trash-fill"></iconify-icon>Elimina
                    </div>

                    <div class="modal fade" id="deleteModal{{ $allenatore->id_allenatore }}" tabindex="-1"
                        aria-labelledby="deleteModalLabel{{ $allenatore->id_allenatore }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteModalLabel{{ $allenatore->id_allenatore }}">
                                        Eliminazione</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Sei sicuro di voler eliminare l'allenatore {{ $allenatore->nome }}
                                    {{ $allenatore->cognome }}?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annulla</button>
                                    <form
                                        action="{{ route('allenatori.destroy', ['allenatori' => $allenatore->id_allenatore]) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Elimina</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection