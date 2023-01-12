@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Inserimento nuova pasta</h1>

        <form action="{{route('pastas.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Inserire il titolo">
              </div>
            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input type="text" class="form-control" name="image" id="image" placeholder="Inserire la URL dell'immagine">
              </div>
            <div class="mb-3">
                <label for="cooking_time" class="form-label">Tempo di cottura</label>
                <input type="text" class="form-control" name="cooking_time" id="cooking_time" placeholder="Inserire il tempo di cottura">
              </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipo</label>
                <input type="text" class="form-control" name="type" id="type" placeholder="Inserire il tipo di pasta">
              </div>
              <div class="mb-3">
                <label for="weight" class="form-label">Peso</label>
                <input type="text" class="form-control" name="weight" id="weight" placeholder="Inserire il peso">
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary mb-5">Invia</button>
        </form>

    </div>
@endsection
