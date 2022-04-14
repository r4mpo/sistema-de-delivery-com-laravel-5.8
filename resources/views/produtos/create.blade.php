@extends('layouts.main')
@section('title', 'Novo Produto')
@section('content')
<div class="formcreate">
    <form action="/produtos" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><ion-icon name="pencil-outline"></ion-icon></span>
            <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome do produto" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text"><ion-icon name="cash-outline"></ion-icon></span>
            <input type="text" class="form-control" name="preco" id="preco" placeholder="Preço do produto" aria-label="Amount (to the nearest dollar)">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><ion-icon name="arrow-up-outline"></ion-icon></span>
            <input type="number" class="form-control" name="qtd" id="qtd" placeholder="Quantidade em estoque" aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group">
            <span class="input-group-text"><ion-icon name="information-circle-outline"></ion-icon></span>
            <textarea class="form-control" name="descricao" id="descricao" aria-label="With textarea" placeholder="Informe características do produto"></textarea>
        </div>
        <div class="selectimg">
            <h5>Selecione uma imagem do produto</h5>
            <input type="file" name="image" id="image">
        </div>
        <button type="submit" class="btn btn-outline-success" style="margin-top: 2%;">Cadastrar</button>
    </form>
</div>
@endsection