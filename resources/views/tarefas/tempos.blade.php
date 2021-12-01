@extends('layouts.base')

@section('titulo', 'Tarefas')

@section('descricao_pagina', 'Alterações em Tarefas')

@section('conteudo')

    <div class="card shadow">
        <div class="card-body">

            <ul class="nav nav-pills mb-3">

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tarefas.edit', $tarefa->id) }}">Tarefa</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="#">Tempos</a>
                </li>

            </ul>

            <h5 class="card-title"><strong>Execuções da Tarefa</strong></h5>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">
                                <button id="modal-button" class="btn btn-primary" type="button" >
                                    Adicionar Tempo
                                </button>
                            </th>
                            <th scope="col">Horário de Início</th>
                            <th scope="col">Horário de Término</th>
                            <th>Horas</th>
                        </tr>
                    </thead>
                    <tbody>

                        @php
                            $sum = 0;
                        @endphp

                        @foreach ($tempos as $tempo)

                            <tr>
                                <td scope="row">

                                    <div class="btn-group btn-group-sm" role="group">
                                        <button type="button" class="btn btn-primary editar" data-link="{{ route('tempos.edit', $tempo->id) }}">Editar</button>
                                        <button type="button" class="btn btn-danger excluir" data-link="{{ route('tempos.destroy', $tempo->id) }}">Excluir</button>
                                    </div>

                                </td>

                                <td><p>{{data_tempo($tempo->inicio)}}</p></td>

                                <td><p>{{data_tempo($tempo->fim)}}</p></td>

                                <td align="right">
                                    <p>{{horas_minutos(minutos($tempo->inicio, $tempo->fim))}}</p>
                                </td>

                            </tr>

                            @php
                                $sum += minutos($tempo->inicio, $tempo->fim)
                            @endphp

                        @endforeach

                        <tr class="bg-ligth">
                            <td colspan="3"></td>
                            <td align="right">
                                <p><strong>Total:</strong> {{horas_minutos($sum)}}</p>
                            </td>
                        </tr>

                    </tbody>

                </table>
            </div>

        </div>

    </div>

    <div class="modal fade" id="cadastrar-tempo" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><strong id="titulo-modal">Adicionar Tempo</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form id="form-cadastrar-tempo" action="javascript:;" method="post" data-action="" data-update="">
                        @csrf

                        <input id="id_tarefa" type="hidden" name="id_tarefa" value="<?= $tarefa->id?>"/>

                        <div class="form-row">

                            <div class="form-group col-md-6 ">

                                <label for="inicio">Horário de Início</label>

                                <input id="inicio" class="form-control" type="datetime-local" name="inicio" value="">

                            </div>

                            <div class="form-group col-md-6">

                                <label for="fim">Horário de Fim</label>

                                <input id="fim" class="form-control" type="datetime-local" name="fim" value="">

                            </div>

                        </div>

                    </form>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary" form="form-cadastrar-tempo" >Salvar</button>
                </div>

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

        /* Excluir tempo */
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

        /* Abre modal para Cadastro  */
        $(document).on('click', '#modal-button', function(){
            $('#inicio').val('');
            $('#fim').val('');
            $('#form-cadastrar-tempo').data('update', '');
            $('#titulo-modal').text('Adicionar Tempo');
            $('#cadastrar-tempo').modal('show');

        });

        /* Configura Token para o Ajax */
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            }
        });

        /* Abre modal para Edição */
        $(document).on('click', '.editar', function(){

            var elemento = $(this);

            $.ajax({
                type: "get",
                url: elemento.data('link'),
                dataType: "json",
                success: function (response) {

                    $('#inicio').val(converte_data(response.tempo.inicio));
                    $('#fim').val(converte_data(response.tempo.fim));
                    $('#form-cadastrar-tempo').data('update', response.route);
                    $('#titulo-modal').text('Editar Tempo');
                    $('#cadastrar-tempo').modal('show');

                }

            });

        });

        /* Realiza as requisições de store e update */
        $(document).on('submit', '#form-cadastrar-tempo', function () {

            var form = $(this);

            if(form.data('update') != ''){

                $.ajax({
                    type: "put",
                    url: form.data('update'),
                    data: form.serialize(),
                    dataType: "json",
                    success: function (response) {
                        if(response.tipo == 'success'){
                            window.location.href = '{{route('tarefas.tempos', $tarefa->id)}}';
                        }
                    }
                });

            }else{

                $.ajax({
                    type: "post",
                    url: "{{route('tempos.store')}}",
                    data: form.serialize(),
                    dataType: "json",
                    success: function (response) {
                        if(response.tipo == 'success'){
                            window.location.href = '{{route('tarefas.tempos', $tarefa->id)}}';
                        }
                    }
                });
            }

        });

        /* helper para converção de data */
        function converte_data(data){
            result = data.replace(' ', 'T');
            return result;
        }

    </script>
@endsection
