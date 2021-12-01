@extends('layouts.base')

@section('titulo', "Clientes")

@section('descricao_pagina', "Alterações em Clientes")

@section('conteudo')
<div class="card shadow">
    <div class="card-body">
        <h5 class="card-title">Alterar Cliente</h5>
        <form action="{{route('clientes.update', $cliente->id)}}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-row">
                <div class="form-group col-md-6 ">
                    <label for="nome">Nome</label>
                    <input id="nome" class="form-control @error('nome') is-invalid @enderror" type="text" name="nome" value="{{$cliente->nome}}">
                    @error('nome')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="email">E-mail</label>
                    <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{$cliente->email}}">
                    @error('email')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 ">
                    <label for="telefone">Telefone</label>
                    <input id="telefone" class="form-control @error('telefone') is-invalid @enderror" type="tel" name="telefone" value="{{$cliente->telefone}}">
                    @error('telefone')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="whatsapp">Whatsapp</label>
                    <input id="whatsapp" class="form-control @error('whatsapp') is-invalid @enderror" type="tel" name="whatsapp" value="{{$cliente->whatsapp}}">
                    @error('whatsapp')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 ">
                    <label for="estado">Estado</label>
                    <input id="estado" class="form-control @error('estado') is-invalid @enderror" type="text" name="estado" value="{{$cliente->estado}}">
                    @error('estado')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6 ">
                    <label for="cidade">Cidade</label>
                    <input id="cidade" class="form-control @error('cidade') is-invalid @enderror" type="text" name="cidade" value="{{$cliente->cidade}}">
                    @error('cidade')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12 ">
                    <label for="endereco">Endereço</label>
                    <input id="endereco" class="form-control @error('endereco') is-invalid @enderror" type="text" name="endereco" value="{{$cliente->endereco}}">
                </div>
            </div>

            <div class="row justify-content-end">
                <button class="btn btn-lg btn-primary shadow mr-3" type="submit">Alterar</button> <button class="btn btn-lg btn-secondary shadow mr-3" type="button" onclick="window.location.href='{{route('clientes.index')}}'">Voltar</button>
            </div>

        </form>
    </div>
</div>
@endsection
