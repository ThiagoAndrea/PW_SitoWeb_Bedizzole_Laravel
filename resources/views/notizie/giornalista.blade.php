@php
    use Illuminate\Support\Str;
    use Carbon\Carbon;
@endphp


@extends('layouts.master')

@section('title', 'Admin - Gestione rose - FC Bedizzole')

@section('breadcrumb')
<div class="container">
    <nav aria-label="breadcrumb" id="breadcrumb-nav">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('notizie.index') }}">Notizie</a></li>
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
    <div class="container d-flex justify-content-center">
        <a href="{{route('notizie.create')}}" class="btn btn-success add-news">Scrivi una nuova notizia</a>
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
                <div class="col">{{ Carbon::parse($notizia->data)->format('d-m-Y')}}</div>
                <div class="col">
                    <a href="{{ route('notizie.edit', ['notizie' => $notizia->id_notizia]) }}"
                        class="btn btn-light"><iconify-icon icon="mdi:pencil"></iconify-icon> Modifica</a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $notizia->id_notizia }}">
                                        <iconify-icon icon="bi:trash-fill"></iconify-icon>Elimina
                </div>
                <div class="modal fade" id="deleteModal{{ $notizia->id_notizia }}" tabindex="-1"
                    aria-labelledby="deleteModalLabel{{ $notizia->id_notizia }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteModalLabel{{ $notizia->id_notizia }}">
                                    Eliminazione</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Sei sicuro di voler eliminare la notizia {{ $notizia->titolo }}?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annulla</button>
                                <form action="{{ route('notizie.destroy', ['notizie' => $notizia->id_notizia]) }}"
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