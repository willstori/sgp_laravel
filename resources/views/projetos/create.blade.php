@extends('layouts.base')

@section('titulo', "Projetos")

@section('descricao_pagina', "Cadastro de novos Projetos")

@section('conteudo')
<div class="card shadow">
    <div class="card-body">
        <h5 class="card-title">Novo Projeto</h5>
        <form action="{{route('projetos.store')}}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="cliente">Cliente</label>
                    <select id="cliente" class="form-control @error('id_cliente') is-invalid @enderror" name="id_cliente" >
                        <option value="">Cliente:</option>
                        @foreach ($clientes as $c)
                            <option value="{{$c['id']}}" {{ $c['id'] == old('id_cliente') ? 'selected' : '' }}>{{$c['nome']}}</option>
                        @endforeach
                    </select>
                    @error('id_cliente')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Nome</label>
                    <input id="nome" class="form-control @error('nome') is-invalid @enderror" type="text" name="nome" value="{{old('nome')}}">
                    @error('nome')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 ">
                    <label for="data_inicio">Data de Início</label>
                    <input id="data_inicio" class="form-control @error('data_inicio') is-invalid @enderror" type="date" name="data_inicio" value="{{old('data_inicio')}}">
                    @error('data_inicio')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="data_fim">Data de Fim</label>
                    <input id="data_fim" class="form-control @error('data_fim') is-invalid @enderror" type="date" name="data_fim" value="{{old('data_fim')}}">
                    @error('data_fim')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="id_etapa">Etapa</label>
                    <select id="id_etapa" class="form-control @error('id_etapa') is-invalid @enderror" name="id_etapa" >
                        <option value="">Etapa:</option>
                        @foreach ($etapas as $e)
                            <option value="{{$e['id']}}" {{$e['id'] == old('id_etapa') ? 'selected' : ''}}>{{$e['nome']}}</option>
                        @endforeach
                    </select>
                    @error('id_etapa')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

            </div>

            <div class="row justify-content-end">
                <button class="btn btn-lg btn-primary shadow mr-3" type="submit">Cadastrar</button> <button class="btn btn-lg btn-secondary shadow mr-3" type="button" onclick="window.location.href='{{route('projetos.index')}}'">Voltar</button>
            </div>

        </form>
    </div>
</div>
@endsection
