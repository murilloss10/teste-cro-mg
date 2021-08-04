<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Endereços') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{url('/enderecos/editar/salvar')}}" method="POST" id="form-add" class="col-md-12">

                        @csrf
                        
                        <input type="text" name="id" value="{{$dataAddress->id}}" hidden>
                        <div class="mb-3 row">
                            <label for="street" class="col-sm-2 col-form-label">Rua</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="street" name="street" value="{{$dataAddress->street}}">
                            </div>
                            <label for="number" class="col-sm-1 col-form-label">Nº</label>
                            <div class="col-sm-2">
                                <input type="number" class="form-control" id="number" name="number" value="{{$dataAddress->number}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="district" class="col-sm-2 col-form-label">Bairro</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="district" name="district" value="{{$dataAddress->district}}">
                            </div>
                            <label for="zip_code" class="col-sm-1 col-form-label">CEP</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{$dataAddress->zip_code}}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="complement" class="col-sm-2 col-form-label">Complemento</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="complement" name="complement" value="{{$dataAddress->complement}}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>

                    </form>

                </div>

                <div class="p-6 bg-white border-b border-gray-200">
                    
                    @include('tables.table-address')

                </div>
            </div>
        </div>
    </div>
</x-app-layout>