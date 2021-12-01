@extends('layouts.base')

@section('titulo', 'Clientes')

@section('descricao_pagina', 'Listagem de Clientes')

@section('conteudo')

    <div class="card shadow mb-4">
        <div class="card-body">
            <h5 class="card-title">Lista de Clientes</h5>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"><button class="btn btn-primary"
                                    onclick="window.location.href='{{ route('clientes.create') }}'">+ Cadastrar</button>
                            </th>
                            <th scope="col">Nome</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">E-mail</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($clientes as $cliente)
                            <tr>
                                <th scope="row">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-primary" onclick="window.location.href='{{route('clientes.edit', $cliente->id)}}'" >Editar</button>
                                        <button type="button" class="btn btn-danger excluir" data-link="{{ route('clientes.destroy', $cliente->id) }}">Excluir</button>
                                    </div>
                                </th>
                                <td>{{ $cliente->nome }}</td>
                                <td>{{ $cliente->telefone }}</td>
                                <td>{{ $cliente->email }}</td>
                            </tr>
                        @endforeach

                        @empty($clientes)
                            <tr>
                                <td colspan="4">
                                    <p>Nenhum <strong>Cliente</strong> cadastrado no momento.</p>
                                </td>
                            </tr>
                        @endempty

                    </tbody>
                </table>

                <nav>
                    <ul class="pagination justify-content-end">
                        {{$clientes->links()}}
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
