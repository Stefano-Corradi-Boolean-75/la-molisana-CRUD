@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Elenco paste</h1>

        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Titolo</th>
                <th scope="col">Tipo</th>
                <th scope="col">Azioni</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($pastas as $pasta )
                    <tr>
                        <td>{{$pasta->id}}</td>
                        <td>{{$pasta->title}}</td>
                        <td>{{$pasta->type}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{route('pastas.show', $pasta)}}" title="show"><i class="fa-regular fa-eye"></i></a>
                            <a class="btn btn-warning " href="#" title="edit"><i class="fa-solid fa-pencil"></i></a>
                            <a class="btn btn-danger " href="#" title="delete"><i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                @empty
                    <h1>Nessun prodotto trovato</h1>
                @endforelse

            </tbody>
          </table>

          {{$pastas->links()}}

    </div>
@endsection
