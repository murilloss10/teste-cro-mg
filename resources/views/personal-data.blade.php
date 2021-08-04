<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dados Pessoais') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if (count($dataProfiles) == 0)
                        @include('forms.form-create-personal-data')
                    @else
                        @forelse ($dataProfiles as $data)
                            @include('forms.form-edit-personal-data')
                        @empty
                        @endforelse

                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>