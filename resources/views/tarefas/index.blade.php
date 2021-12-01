@extends('layouts.base')

@section('titulo', 'Tarefas')

@section('descricao_pagina', 'Listagem de Tarefas')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-body">
            <h5 class="card-title">Lista de Tarefas</h5>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"><button class="btn btn-primary"
                                    onclick="window.location.href='{{ route('tarefas.create') }}'">+ Cadastrar</button>
                            </th>
                            <th scope="col">Tarefa</th>
                            <th scope="col">Data de Início</th>
                            <th scope="col">Data de Fim</th>
                            <th scope="col">Prioridade</th>
                            <th scope="col">Status</th>
                            <th scope="col">Cobrada</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($tarefas as $tarefa)
                            <tr>
                                <th scope="row">
                                    <div class="btn-group btn-group-sm" role="group">
                                        <button type="button" class="btn btn-primary" onclick="window.location.href='{{route('tarefas.edit', $tarefa->id)}}'" >Editar</button>
                                        <button type="button" class="btn btn-danger excluir" data-link="{{ route('tarefas.destroy', $tarefa->id) }}">Excluir</button>
                                    </div>
                                </th>
                                <td><strong>{{ $tarefa->nome }}</strong><br> {{ $tarefa->projeto->cliente->nome }} - {{ $tarefa->projeto->nome }}</td>
                                <td>{{ data($tarefa->data_inicio) }}</td>
                                <td>{{ data($tarefa->data_fim) }}</td>
                                <td><h4><span class="badge badge-{{$tarefa->prioridade->class}}">{{$tarefa->prioridade->nome}}</span></h4></td>
                                <td><h4><span class="badge badge-{{ $tarefa->status->class }}">{{ $tarefa->status->nome }}</span></h4></td>
                                <td>{{$tarefa->faturada == true ? 'Sim' : 'Não'}}</td>
                            </tr>
                        @endforeach

                        @empty($tarefas)
                            <tr>
                                <td colspan="4">
                                    <p>Nenhum <strong>Tarefa</strong> cadastrado no momento.</p>
                                </td>
                            </tr>
                        @endempty

                    </tbody>
                </table>

                <nav>
                    <ul class="pagination justify-content-end">
                        {{$tarefas->links()}}
                    </ul>
                </nav>

            </div>
        </div>
    </div>

    <form id="form-excluir" action="" method="post" style="display: none">
        @csrf
        @method('DELETE')
    </form>

@endsection

@section('scripts')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).on('click', '.excluir', function(){
            var elemento = $(this);
            Swal.fire({
                title: 'Atenção!',
                text: "Uma vez removido não será possível recuperar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Sim, Excluir!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form-excluir').attr('action', elemento.data('link')).submit();
                }
            });
        })
    </script>

@endsection
