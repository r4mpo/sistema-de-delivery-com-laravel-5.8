@extends('layouts.main')
@section('title', 'PHP E-COMMERCE')
@section('content')
@if(session('msg'))
<p class="msgsucess">{{ session('msg') }}</p>
@endif
<div class="row" style="margin-top: 3%;">
    @foreach($produto as $p)
    <div class="card" style="width: 18rem;">
        <img src="/img/produtos/{{ $p->image }}" class="card-img-top" alt="{{ $p->nome }}">
        <div class="card-body">
            <p class="card-title">{{ $p->nome }}</h5>
            <p class="card-text">R${{ $p->preco }}</p>
            <a href="/produtos/show/{{ $p->id }}" class="btn btn-outline-info">Saiba mais</a>
        </div>
    </div>
    @endforeach
</div>
@endsection