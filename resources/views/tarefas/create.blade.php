@extends('layouts.base')

@section('titulo', 'Tarefas')

@section('descricao_pagina', 'Cadastro de novas Tarefas')

@section('conteudo')

    <div class="card shadow">

        <div class="card-body">

            <h5 class="card-title">Nova Tarefa</h5>

            <form action="{{ route('tarefas.store') }}" method="post">
                @csrf
                <div class="form-check form-check-inline mb-2">

                    <input id="faturada-true" class="form-check-input" type="radio" name="faturada" value="1" checked>

                    <label class="form-check-label" for="faturada-true">Tarefa Cobrada</label>

                </div>

                <div class="form-check form-check-inline mb-2">

                    <input id="faturada-false" class="form-check-input" type="radio" name="faturada" value="0">

                    <label class="form-check-label" for="faturada-false">Tarefa não Cobrada</label>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-6">

                        <label for="id_projeto">Projeto</label>

                        <select id="id_projeto" class="form-control @error('id_projeto') is-invalid @enderror" name="id_projeto">
                            <option value="">Projeto:</option>
                            @foreach ($projetos as $p)
                                <option value="{{ $p['id'] }}" {{ $p['id'] == old('id_projeto') ? 'selected' : '' }}>{{$p->cliente->nome}} - {{ $p['nome'] }}</option>
                            @endforeach
                        </select>

                        @error('id_projeto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="form-group col-md-6">

                        <label for="email">Nome</label>

                        <input id="nome" class="form-control @error('nome') is-invalid @enderror" type="text" name="nome" value="{{ old('nome') }}">

                        @error('nome')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>


                </div>

                <div class="form-row">

                    <div class="form-group col-md-6">

                        <label for="id_user">Colaborador</label>

                        <select id="id_user" class="form-control @error('id_user') is-invalid @enderror" name="id_user">
                            <option value="">Colaborador:</option>
                            @foreach ($users as $u)
                                <option value="{{ $u['id'] }}" {{ $u['id'] == old('id_user') ? 'selected' : '' }}>{{ $u['name'] }}</option>
                            @endforeach
                        </select>

                        @error('id_user')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="form-group col-md-3">

                        <label for="id_prioridade">Prioridade</label>

                        <select id="id_prioridade" class="form-control @error('id_prioridade') is-invalid @enderror" name="id_prioridade">
                            @foreach ($prioridades as $p)
                                <option value="{{ $p->id }}" {{ $p->id == old('id_prioridade') ? 'selected' : '' }}>{{ $p->nome }}</option>
                            @endforeach
                        </select>

                        @error('id_projeto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="form-group col-md-3">

                        <label for="id_status">Status</label>

                        <select id="id_status" class="form-control @error('id_status') is-invalid @enderror" name="id_status">
                            @foreach ($status as $s)
                                <option value="{{ $s->id }}" {{ $s->id == old('id_status') ? 'selected' : '' }}> {{ $s->nome }}</option>
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

                        <input id="data_inicio" class="form-control @error('data_inicio') is-invalid @enderror" type="date" name="data_inicio" value="{{ old('data_inicio') }}">

                        @error('data_inicio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                    <div class="form-group col-md-6">

                        <label for="data_fim">Data de Fim</label>

                        <input id="data_fim" class="form-control @error('data_fim') is-invalid @enderror" type="date" name="data_fim" value="{{ old('data_fim') }}">

                        @error('data_fim')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                </div>

                <div class="form-row">

                    <div class="form-group col-md-12">

                        <label for="data_fim">Descrição</label>

                        <textarea class="form-control @error('descricao') is-invalid @enderror" name="descricao" rows="5">{{ old('descricao') }}</textarea>

                        @error('data_fim')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>

                </div>

                <div class="row justify-content-end">
                    <button class="btn btn-lg btn-primary shadow mr-3" type="submit">Cadastrar</button> <button class="btn btn-lg btn-secondary shadow mr-3" type="button" onclick="window.location.href='{{ route('tarefas.index') }}'">Voltar</button>
                </div>

            </form>

        </div>

    </div>

@endsection


