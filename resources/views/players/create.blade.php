@extends('layouts.template')

@section('title', 'Crear jugador')

@section('content')
    <div class="flex p-5 justify-start">
        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded""
            href="{{ route('players.index') }}">Volver</a>
    </div>
    <div class="flex justify-end items-center flex-col">
        <div  class="w-1/2">
            <div class="flex min-h-full flex-col justify-center px-6 lg:px-8">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                  <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Crear jugador</h2>
                </div>

                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                  <form class="space-y-6" action="{{ route('players.store') }}" method="POST">
                    @csrf
                    <div>
                      <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nombre</label>
                      <div class="mt-2">
                        <input type="text" name="name" id="name" autocomplete="name" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-2">
                      </div>
                      <label for="">
                        @error('name')
                            <small>*{{ $message }}</small>
                        @enderror
                      </label>
                    </div>

                    <div>
                        <label for="money" class="block text-sm font-medium leading-6 text-gray-900">Saldo</label>
                        <div class="mt-2">
                          <input type="number" name="money" id="money" autocomplete="money" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-2">
                        </div>
                        <label for="">
                            @error('money')
                                <small>*{{ $message }}</small>
                            @enderror
                          </label>
                      </div>

                    <div>
                      <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Crear</button>
                    </div>
                  </form>
                </div>
              </div>
        </div>
    </div>
@endsection
