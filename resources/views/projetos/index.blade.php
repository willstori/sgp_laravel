@extends('layouts.base')

@section('titulo', 'Projetos')

@section('descricao_pagina', 'Listagem de Projetos')

@section('conteudo')

    <div class="card shadow mb-4">
        <div class="card-body">
            <h5 class="card-title">Lista de Projetos</h5>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"><button class="btn btn-primary"
                                    onclick="window.location.href='{{ route('projetos.create') }}'">+ Cadastrar</button>
                            </th>
                            <th scope="col">Nome</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Data de Início</th>
                            <th scope="col">Data de Fim</th>
                            <th scope="col">Etapa</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($projetos as $projeto)
                            <tr>
                                <th scope="row">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-primary" onclick="window.location.href='{{route('projetos.edit', $projeto->id)}}'" >Editar</button>
                                        <button type="button" class="btn btn-danger excluir" data-link="{{ route('projetos.destroy', $projeto->id) }}">Excluir</button>
                                    </div>
                                </th>
                                <td>{{ $projeto->nome }}</td>
                                <td>{{ $projeto->cliente->nome }}</td>
                                <td>{{ data($projeto->data_inicio) }}</td>
                                <td>{{ data($projeto->data_fim) }}</td>
                                <td>{{ $projeto->etapa->nome }}</td>
                            </tr>
                        @endforeach

                        @empty($projetos)
                            <tr>
                                <td colspan="4">
                                    <p>Nenhum <strong>Projeto</strong> cadastrado no momento.</p>
                                </td>
                            </tr>
                        @endempty

                    </tbody>
                </table>

                <nav>
                    <ul class="pagination justify-content-end">
                        {{$projetos->links()}}
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
