@extends('layouts.main')
@section('title', 'Produtos')
@section('content')
@if(session('msg'))
<p class="msgsucess">{{ session('msg') }}</p>
@endif
<table class="table table-success table-striped" style="width: 600px; margin-left: 25%; margin-top: 3%;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Produto</th>
      <th scope="col"><ion-icon name="create-outline"></ion-icon></th>
      <th scope="col"><ion-icon name="trash-outline"></ion-icon></th>
    </tr>
  </thead>
  <tbody>
    @foreach($produto as $p)
    <tr>
      <th scope="row">{{ $loop->index+1 }}</th>
      <td><a href="/produtos/show/{{ $p->id }}">{{ $p->nome }}</a></td>
      <td><button class="btn btn-info"><a href="/produtos/edit/{{ $p->id }}">Editar</a></button></td>
      <!-- A seguir, criaremos o botão de excluir -->
      <td>
        <form action="/produtos/delete/{{ $p->id }}" method="GET">
          <button type="submit" a href="/produtos/delete/{{ $p->id }}" class="btn btn-danger">Excluir</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection