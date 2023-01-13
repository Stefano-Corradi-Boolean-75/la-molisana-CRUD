@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Elenco paste</h1>

        @if (session('deleted'))
          {{-- blocco da mostrare solo se è presente la variabile di sessione 'deleted'  --}}
            <div>
                <div class="alert alert-success" role="alert">
                    {{session('deleted')}}
                </div>
            </div>
        @endif


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
                            <a class="btn btn-warning " href="{{route('pastas.edit', $pasta)}}" title="edit"><i class="fa-solid fa-pencil"></i></a>
                            {{-- pre il DELETE occorre un form  --}}
                            {{-- <form
                                onsubmit="return confirm('Confermi l\'eliminazione di: {{$pasta->title}}')"
                                class="d-inline" action="{{route('pastas.destroy', $pasta)}}" method="POST">
                            @csrf
                            @method('DELETE')

                                <button type="submit" class="btn btn-danger " title="delete"><i class="fa-solid fa-trash"></i></button>
                            </form> --}}

                            {{-- il form lo includo dai partial passando il parametro che mi serve --}}
                            @include('partials.form-delete',['title'=>$pasta->title, 'id'=>$pasta->id])
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
