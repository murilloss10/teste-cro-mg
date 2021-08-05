<form action="{{url('/dados-pessoais/salvar')}}" method="POST" class="col-md-12" enctype="multipart/form-data">

    @csrf

    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Nome</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name"  value="{{$dataUser->name}}" disabled>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="last_name" class="col-sm-2 col-form-label">Sobrenome</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{$dataUser->last_name}}" disabled>
        </div>
    </div>
    

    <div class="mb-3 row">
        <label for="titration" class="col-sm-2 col-form-label">Titulação</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="titration" name="titration" value="{{old('titration')}}">
            @error('titration')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <label for="cpf" class="col-sm-2 col-form-label">CPF</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="cpf" name="cpf" value="{{old('cpf')}}">
            @error('cpf')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="mb-3 row">
        <label for="rg" class="col-sm-2 col-form-label">RG</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="rg" name="rg" value="{{old('rg')}}">
            @error('rg')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>

</form>