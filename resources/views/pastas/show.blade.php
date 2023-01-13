@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>{{$pasta->title}}
            <a class="btn btn-warning " href="{{route('pastas.edit', $pasta)}}" title="edit"><i class="fa-solid fa-pencil"></i></a>
        </h1>
        <div>Tipo: <strong>{{$pasta->type}}</strong></div>
        <div>Peso: <strong>{{$pasta->weight}}</strong></div>
        <div>Tempo di cottura: <strong>{{$pasta->cooking_time}}</strong></div>
        <div class="text-center">
            <img src="{{$pasta->image}}" alt="{{$pasta->title}}">
        </div>
        <p>{!!$pasta->description!!}</p>
        <a class="btn btn-info" href="{{route('pastas.index')}}">Torna all'elenco delle paste</a>
    </div>
@endsection
