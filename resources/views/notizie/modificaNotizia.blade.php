@extends('layouts.master')

@section('titolo_head', 'Notizie - FC Bedizzole')

@section('breadcrumb')
    <div class="container">
        <nav aria-label="breadcrumb" id="breadcrumb-nav">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href={{ route('home') }}>Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('notizie.index') }}">Notizie</a></li>
                <li class="breadcrumb-item"><a href="{{ route('giornalista.index') }}">Giornalista</a></li>
                @if (isset($notizia->id_notizia))
                    <li class="breadcrumb-item active" aria-current="page">Modifica notizia</li>
                @else
                    <li class="breadcrumb-item active" aria-current="page">Agiungi una nuova notizia</li>
                @endif
            </ol>
        </nav>
    </div>
@endsection

@section('contenuto')
    <div class="row justify-content-center">
        <div class="col-md-6 container-aggiungiGiocatore">
            <h5 class="text-center">
                @if (isset($notizia->id_notizia))
                    Modifica la notizia
                @else
                    Aggiungi una nuova notizia
                @endif
            </h5>
            @if (isset($notizia->id_notizia))
                <form method="post" action="{{ route('notizie.update', ['notizie' => $notizia->id_notizia]) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                @else
                    <form method="post" action="{{ route('notizie.store') }}" enctype="multipart/form-data">
            @endif
            @csrf
            <div class="mb-3">
                <label for="titolo" class="form-label">Titolo:</label>
                <input type="text" class="form-control" id="titolo" name="titolo"
                    value="{{ isset($notizia->titolo) ? $notizia->titolo : '' }}" required>
                <span id="titolo-invalido"></span>
            </div>
            <div class="mb-3">
                <div class="row">
                    <label for="testo">Testo:</label>
                    <textarea class="form-control" id="testo" name="testo" rows="15" required>{{ isset($notizia->testo) ? $notizia->testo : '' }}</textarea>
                    <span id="testo-invalido"></span>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="data" class="form-label">Data pubblicazione:</label>
                        <input type="date" class="form-control" id="data" name="data"
                            value="{{ isset($notizia->data) ? $notizia->data : '' }}" required>
                        <span id="data-invalida"></span>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto notizia:</label>
                <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
            </div>
            @if (isset($notizia) && $notizia->foto)
                <div class="mb-3">
                    <p>Immagine attuale:</p>
                    <img src="{{ isset($notizia->foto) ? asset('img/notizie/' . $notizia->foto) : '' }}"
                        class="img-fluid img-modifica">
                </div>
            @endif

            <div class="d-flex justify-content-between">
                @if (isset($notizia->id_notizia) && $notizia != null)
                    <input type="hidden" name="id" value="{{ $notizia->id_notizia }}">
                    <button type="button" class="btn btn-secondary" onclick="window.history.back()">Annulla</button>
                    <button type="submit" class="btn btn-success"
                        onclick="event.preventDefault(); checkNotizia()">Salva</button>
                @else
                    <button type="button" class="btn btn-secondary" onclick="window.history.back()">Annulla</button>
                    <button type="submit" class="btn btn-success"
                        onclick="event.preventDefault(); checkNotizia()">Aggiungi</button>
                @endif
            </div>
            </form>
        </div>
    </div>
    </div>
@endsection
