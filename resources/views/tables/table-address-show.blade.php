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
            </tr>

        @empty

            <tr>
                <td colspan="14" style="text-align: center;">:( Sem endereços adicionados.</td>
            </tr>

        @endforelse

    </table>
</div>