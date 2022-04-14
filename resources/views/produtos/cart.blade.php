@extends('layouts.main')
@section('title', 'Carrinho')
@section('content')
@if(session('msg'))
<p class="msgsucess">{{ session('msg') }}</p>
@endif
<table class="table table-success table-striped" style="width: 450px; margin-left: 35%; margin-top: 3%;">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Produto</th>
      <th scope="col"><ion-icon name="trash-outline"></ion-icon></th>
    </tr>
  </thead>
  @foreach($ProdutosNoCarrinho as $p)
  <tbody>
    <td>{{ $loop->index+1 }}</td>
    <td><a href="/produtos/show/{{ $p->id }}">{{ $p->nome }}</a></td>
    <td>
      <form action="/produtos/dltcart/{{ $p->id }}" method="get">
        <button type="submit" class="btn btn-outline-danger">Excluir</button></td>
      </form>
  </tbody>
  @endforeach
</table>
@endsection