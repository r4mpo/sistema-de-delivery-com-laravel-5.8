@extends('layouts.main')
@section('title', $produto->nome)
@section('content')
<div class="show" style="margin-top: 2%;">
    <img src="/img/produtos/{{ $produto->image }}">
</div>
<div class="info">
    <p class="infoname">{{ $produto->nome }}</p>
    <p class="infodesc">{{ $produto->descricao }}</p>
    <p class="infopreco">R${{ $produto->preco }}</p>
    <p class="infoestoque">{{ $produto->qtd }} unidades disponíveis.<p>
    @if(isset($user))
        @if($user['id'] != 1 && !$Cart)
        <form action="/produtos/addcart/{{ $produto->id }}" method="get" style="margin-left: 30%;">
            @csrf
            <button type="submit" class="btn btn-outline-dark"><ion-icon name="cart-outline"></ion-icon> Adicionar ao Carrinho</button>
        </form>
        @endif
    @endif
</div>
@endsection