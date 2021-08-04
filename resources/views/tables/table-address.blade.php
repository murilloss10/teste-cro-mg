<div class="table-responsive">
    <table class="table table table-striped table-bordered">
        <thead>
            <tr>
                <th>RUA</th>
                <th>NÚMERO</th>
                <th>BAIRRO</th>
                <th>CEP</th>
            </tr>
        </thead>

        @forelse ($dataAddresses as $dado)
            <tr>
                <td>{{$dado->street}}</td>
                <td>{{$dado->number}}</td>
                <td>{{$dado->district}}</td>
                <td>{{$dado->zip_code}}</td>
                <td>
                    <!-- Button para adicionar modalExibir -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalExibir{{$dado->id}}">
                        Exibir
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="modalExibir{{$dado->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="exampleModalLabel"><strong>INFORMAÇÕES DO ENDEREÇO</strong></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <strong>ID: </strong>{{$dado->id}}<br/>
                                    <strong>Rua: </strong>{{$dado->street}}, <strong>Nº:</strong> {{$dado->number}}<br/>
                                    <strong>Bairro: </strong>{{$dado->district}}<br/>
                                    <strong>CEP: </strong>{{$dado->zip_code}}<br/>
                                    <strong>Complemento: </strong>{{$dado->complement}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary"><a class="" title="Editar" href="{{url('/enderecos/editar/'.$dado->id)}}">
                        Editar</a>
                    </button>
                    <!-- Button para adicionar modalExcluir -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalExcluir{{$dado->id}}">
                        Excluir
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="modalExcluir{{$dado->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">EXCLUSÃO DE ENDERÇO</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{$dado->street}}, {{$dado->number}}
                                    {{$dado->district}} - CEP: {{$dado->zip_code}}
                                    <br/>
                                    Deseja excluir este endereço ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                    <button type="button" class="btn btn-primary"><a class="button-delete-custom" title="Deletar" href="{{url('/enderecos/excluir/'.$dado->id)}}">Sim</a></button>
                                </div>
                            </div>
                        </div>
                    </div>

                </td>
            </tr>

        @empty

            <tr>
                <td colspan="14" style="text-align: center;">:( Sem endereços adicionados.</td>
            </tr>

        @endforelse

    </table>
</div>