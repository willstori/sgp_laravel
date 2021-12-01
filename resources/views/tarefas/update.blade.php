@extends('layouts.base')

@section('titulo', "Tarefas")

@section('descricao_pagina', "Alterações em Tarefas")

@section('conteudo')

<div class="card shadow">
    <div class="card-body">

        <ul class="nav nav-pills mb-3">

            <li class="nav-item">
              <a class="nav-link active" href="#">Tarefa</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('tarefas.tempos', $tarefa->id)}}">Tempos</a>
            </li>

        </ul>

        <h5 class="card-title"><strong>Alterar Tarefa</strong></h5>

        <form action="{{route('tarefas.update', $tarefa->id)}}" method="post">
            @csrf
            @method('PATCH')
            <div class="form-check form-check-inline mb-2">
                <input id="faturada-true" class="form-check-input" type="radio" name="faturada" value="1" {{$tarefa->faturada == true ? 'checked' : ''}}>
                <label class="form-check-label" for="faturada-true">Tarefa Cobrada</label>
            </div>

            <div class="form-check form-check-inline mb-2">
                <input id="faturada-false" class="form-check-input" type="radio" name="faturada" value="0" {{$tarefa->faturada == false ? 'checked' : ''}}>
                <label class="form-check-label" for="faturada-false">Tarefa não Cobrada</label>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="id_projeto">Projeto</label>
                    <select id="id_projeto" class="form-control @error('id_projeto') is-invalid @enderror" name="id_projeto">
                        <option value="">Tarefa:</option>
                        @foreach ($projetos as $p)
                            <option value="{{ $p->id }}" {{ $p->id == $tarefa->id_projeto ? 'selected' : '' }}>{{$p->cliente->nome}} - {{ $p->nome }}</option>
                        @endforeach
                    </select>
                    @error('id_projeto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Nome</label>
                    <input id="nome" class="form-control @error('nome') is-invalid @enderror" type="text" name="nome" value="{{$tarefa->nome}}">
                    @error('nome')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="id_user">Colaborador</label>
                    <select id="id_user" class="form-control @error('id_user') is-invalid @enderror" name="id_user">
                        @foreach ($users as $u)
                            <option value="{{ $u->id }}" {{ $u->id == $tarefa->id_user ? 'selected' : '' }}>{{ $u->name }}</option>
                        @endforeach
                    </select>
                    @error('id_user')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="id_prioridade">Prioridade</label>
                    <select id="id_prioridade" class="form-control @error('id_prioridade') is-invalid @enderror" name="id_prioridade">
                        @foreach ($prioridades as $p)
                            <option value="{{ $p->id }}" {{ $p->id == $tarefa->id_prioridade ? 'selected' : '' }}>{{ $p->nome }}</option>
                        @endforeach
                    </select>
                    @error('id_prioridade')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="id_status">Status</label>
                    <select id="id_status" class="form-control @error('id_status') is-invalid @enderror" name="id_status">
                        @foreach ($status as $s)
                            <option value="{{ $s->id }}" {{ $s->id == $tarefa->id_status ? 'selected' : '' }}>{{ $s->nome }}</option>
                        @endforeach
                    </select>
                    @error('id_status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6 ">
                    <label for="data_inicio">Data de Início</label>
                    <input id="data_inicio" class="form-control @error('data_inicio') is-invalid @enderror" type="date" name="data_inicio" value="{{$tarefa->data_inicio}}">
                    @error('data_inicio')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="data_fim">Data de Fim</label>
                    <input id="data_fim" class="form-control @error('data_fim') is-invalid @enderror" type="date" name="data_fim" value="{{$tarefa->data_fim}}">
                    @error('data_fim')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">

                <div class="form-group col-md-12">
                    <label for="data_fim">Descrição</label>
                    <textarea class="form-control @error('descricao') is-invalid @enderror" name="descricao" rows="5">{{$tarefa->descricao}}</textarea>
                    @error('data_fim')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

            </div>

            <div class="row justify-content-end">
                <button class="btn btn-lg btn-primary shadow mr-3" type="submit">Alterar</button> <button class="btn btn-lg btn-secondary shadow mr-3" type="button" onclick="window.location.href='{{route('tarefas.index')}}'">Voltar</button>
            </div>

        </form>
    </div>
</div>

@endsection
