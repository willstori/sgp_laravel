@extends('layouts.base')

@section('titulo', "Etapas")

@section('descricao_pagina', "Alterações em Etapas")

@section('conteudo')
<div class="card shadow">
    <div class="card-body">
        <h5 class="card-title">Alterar Etapa</h5>
        <form action="{{route('etapas.update', $etapa->id)}}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="nome">Nome</label>
                    <input id="nome" class="form-control @error('nome') is-invalid @enderror" type="text" name="nome" value="{{$etapa->nome}}">
                    @error('nome')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <div class="row justify-content-end">
                <button class="btn btn-lg btn-primary shadow mr-3" type="submit">Alterar</button> <button class="btn btn-lg btn-secondary shadow mr-3" type="button" onclick="window.location.href='{{route('etapas.index')}}'">Voltar</button>
            </div>

        </form>
    </div>
</div>
@endsection
