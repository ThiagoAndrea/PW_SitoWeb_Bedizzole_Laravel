@extends('layouts.master')

@section('title', 'Admin - Gestione rose - FC Bedizzole')

@section('breadcrumb')
    <div class="container">
        <nav aria-label="breadcrumb" id="breadcrumb-nav">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Admin</li>
                <li class="breadcrumb-item active" aria-current="page">Gestione Rose</li>
            </ol>
        </nav>
    </div>
@endsection

@section('header_section')
    <div class="container">
        <header class="header-section">
            <h1>Gestione Rose</h1>
        </header>
    </div>
@endsection


@section('contenuto')

    <div class="container">
        <div class="container container-ricerca d-flex justify-content-between align-items-center">
            <div class="col-4">
                <select id="squadraSelect" class="form-select">
                    <option value="all">Tutte le squadre</option>
                    @foreach ($squadre as $squadra)
                        <option value="{{ $squadra->id_squadra }}">{{ $squadra->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-4 ml-auto">
                <input type="text" id="searchInput_giocatori" class="form-control" placeholder="Cerca...">
            </div>
        </div>
    </div>



    <div class="container text-center">
        @foreach ($squadre as $squadra)
            @if (count($giocatoriPerSquadra[$squadra->id_squadra]) > 0)
                <div class="container container-gestioneRosa squadra-container"
                    data-squadra-id="{{ $squadra->id_squadra }}">
                    <div class="titolo-squadra">
                        <div class="row">
                            <div class="col-8">
                                <h4>{{ $squadra->nome }}</h4>
                            </div>
                            <div class="col-4">
                                <a href="{{ route('giocatori.create') }}" class="btn btn-success"><iconify-icon
                                        icon="carbon:add-filled"></iconify-icon> Aggiungi giocatore</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-giocatori">
                        <div class="row header">
                            <div class="col">Nome</div>
                            <div class="col">Cognome</div>
                            <div class="col">Data di nascita</div>
                            <div class="col">Ruolo</div>
                            <div class="col">Azioni</div>
                        </div>
                        @foreach ($giocatoriPerSquadra[$squadra->id_squadra] as $giocatore)
                            <div class="row">
                                <div class="col nome">{{ $giocatore->nome }}</div>
                                <div class="col cognome">{{ $giocatore->cognome }}</div>
                                <div class="col">{{ $giocatore->data_di_nascita }}</div>
                                <div class="col">{{ $giocatore->ruolo }}</div>
                                <div class="col">
                                    <a href="{{ route('giocatori.edit', ['giocatori' => $giocatore->id_giocatore]) }}"
                                        class="btn btn-light"><iconify-icon icon="mdi:pencil"></iconify-icon> Modifica</a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $giocatore->id_giocatore }}">
                                        <iconify-icon icon="bi:trash-fill"></iconify-icon>Elimina
                                </div>
                                <div class="modal fade" id="deleteModal{{ $giocatore->id_giocatore }}" tabindex="-1"
                                    aria-labelledby="deleteModalLabel{{ $giocatore->id_giocatore }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5"
                                                    id="deleteModalLabel{{ $giocatore->id_giocatore }}">
                                                    Eliminazione</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Sei sicuro di voler eliminare il giocatore {{ $giocatore->nome }}
                                                {{ $giocatore->cognome }}?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Annulla</button>
                                                <form
                                                    action="{{ route('giocatori.destroy', ['giocatori' => $giocatore->id_giocatore]) }}"
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
            @endif
        @endforeach
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const squadraSelect = document.getElementById('squadraSelect');

            squadraSelect.addEventListener('change', function() {
                const selectedSquadraId = squadraSelect.value;
                const squadreContainers = document.querySelectorAll('.squadra-container');

                squadreContainers.forEach(function(container) {
                    if (selectedSquadraId === 'all') {
                        container.style.display = 'block';
                    } else {
                        if (container.getAttribute('data-squadra-id') === selectedSquadraId) {
                            container.style.display = 'block';
                        } else {
                            container.style.display = 'none';
                        }
                    }
                });
            });
        });
    </script>
@endsection
