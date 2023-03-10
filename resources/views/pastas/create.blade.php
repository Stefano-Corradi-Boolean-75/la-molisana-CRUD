@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Inserimento nuova pasta</h1>


        {{-- il metodo $errors->any() mi restituisce true se ci sono degli errori in sessione --}}
        @if($errors->any())
        <div class="alert alert-danger" role="alert">
            {{-- con $errors->all() ottengo un array con tutti gli errori --}}
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
          </div>

        @endif

        <form action="{{route('pastas.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo *</label>
                {{-- con old('nome_de_campo') stampo il valore se è presente in sessione --}}
                {{-- @error('title') is-invalid @enderror è in pratica un if se è presente un determinato errore --}}
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{old('title')}}" placeholder="Inserire il titolo">
                @error('title')
                    <p  class="invalid-feedback">
                        {{$message}}
                    </p>
                @enderror


              </div>
            <div class="mb-3">
                <label for="image" class="form-label">Immagine *</label>
                <input type="text" class="form-control @error('image') is-invalid @enderror" name="image" id="image"  value="{{old('image')}}" placeholder="Inserire la URL dell'immagine">
                @error('image')
                    <p  class="invalid-feedback">
                        {{$message}}
                    </p>
                @enderror
              </div>
            <div class="mb-3">
                <label for="cooking_time" class="form-label">Tempo di cottura *</label>
                <input type="text" class="form-control @error('cooking_time') is-invalid @enderror" name="cooking_time" id="cooking_time"  value="{{old('cooking_time')}}" placeholder="Inserire il tempo di cottura">
                @error('cooking_time')
                    <p  class="invalid-feedback">
                        {{$message}}
                    </p>
                @enderror
              </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipo *</label>
                <input type="text" class="form-control @error('type') is-invalid @enderror" name="type" id="type" value="{{old('type')}}"  placeholder="Inserire il tipo di pasta">
                @error('type')
                    <p  class="invalid-feedback">
                        {{$message}}
                    </p>
                @enderror
              </div>
              <div class="mb-3">
                <label for="weight" class="form-label">Peso *</label>
                <input type="text" class="form-control @error('weight') is-invalid @enderror" name="weight" id="weight" value="{{old('weight')}}"  placeholder="Inserire il peso">
                @error('weight')
                    <p  class="invalid-feedback">
                        {{$message}}
                    </p>
                @enderror
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" name="description" id="description" rows="3">{{old('description')}}
                </textarea>
              </div>
              <button type="submit" class="btn btn-primary mb-5">Invia</button>
        </form>

    </div>
@endsection
