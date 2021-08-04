<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Filmes Favoritos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{url('/filmes-favoritos/editar/salvar')}}" method="POST" id="form-add" class="col-md-12">

                        @csrf
                        
                        <input type="text" name="id" value="{{$dataFilm->id}}" hidden>
                        <div class="mb-3 row">
                            <label for="title" class="col-sm-2 col-form-label">Título</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title" value="{{$dataFilm->title}}">
                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="release_year" class="col-sm-2 col-form-label">Ano de Lançamento</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="release_year" name="release_year" value="{{$dataFilm->release_year}}">
                                @error('release_year')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="director" class="col-sm-2 col-form-label">Diretor</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="director" name="director" value="{{$dataFilm->director}}">
                                @error('director')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>

                    </form>

                </div>

                <div class="p-6 bg-white border-b border-gray-200">
                    
                    @include('tables.table-films')

                </div>
            </div>
        </div>
    </div>
</x-app-layout>