<div class="table-responsive">
    <table class="table table table-striped table-bordered">
        <thead>
            <tr>
                <th>TÍTULO</th>
                <th>ANO</th>
                <th>DIRETOR</th>
                <th>OPÇÕES</th>
            </tr>
        </thead>

        @forelse ($dataFilms as $dado)
            <tr>
                <td>{{$dado->title}}</td>
                <td>{{$dado->release_year}}</td>
                <td>{{$dado->director}}</td>
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
                                    <h4 class="modal-title" id="exampleModalLabel"><strong>INFORMAÇÕES DO FILME</strong></h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <strong>ID: </strong>{{$dado->id}}<br/>
                                    <strong>Título: </strong>{{$dado->title}}<br/>
                                    <strong>Ano de lançamento: </strong>{{$dado->release_year}}<br/>
                                    <strong>Diretor: </strong>{{$dado->director}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary"><a class="" title="Editar" href="{{url('/filmes-favoritos/editar/'.$dado->id)}}">
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
                                    <h5 class="modal-title" id="exampleModalLabel">{{$dado->title}}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Deseja excluir este filme ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                                    <button type="button" class="btn btn-primary"><a class="button-delete-custom" title="Deletar" href="{{url('/filmes-favoritos/excluir/'.$dado->id)}}">Sim</a></button>
                                </div>
                            </div>
                        </div>
                    </div>

                </td>
            </tr>

        @empty

            <tr>
                <td colspan="14" style="text-align: center;">Sem atividades cadastradas.</td>
            </tr>

        @endforelse

    </table>
</div>