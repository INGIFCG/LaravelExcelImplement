<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (\Session::has('success'))
                <div id='' class='alert alert-success'>
                    {!! \Session::get('success') !!}
                </div>
            @endif
            {{-- error --}}
            @if (\Session::has('error'))
                <div id='' class='alert alert-danger'>
                    {!! \Session::get('error') !!}
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container ">
                        <br>
                        <div class="row">
                            <div class="clod-md-4">
                            </div>
                            <div class="clod-md-6">
                                <div class="row">
                                    <form action="{{ route('test.import') }}" method='post'
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class='clo-md-6 '>
                                            <input type="file" name='document'>
                                        </div>
                                        <div class='clo-md-6 mt-3'>
                                            <button class='btn btn-dark' type='submit'>Importar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-2 mt-3">
                                <button class='btn btn-success'>Exportar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
