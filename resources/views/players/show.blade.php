@extends('layouts.template')

@section('title', 'Detalles del jugador')

@section('content')

    <div class="flex p-5 justify-start justify-between">

        <div>
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                href="{{ route('players.index') }}">Volver</a>
        </div>
        <div class="flex flex-row gap-2">
            <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                href="{{ route('players.edit', $player) }}">Editar</a>
            <form action="{{ route('players.destroy', $player) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                    type="submit">Eliminar</button>
            </form>
        </div>
    </div>
    <div class="flex justify-end items-center flex-col">
        <div class="w-1/2">
            <div class="flex min-h-full flex-col justify-center px-6 lg:px-8">
                <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Detalles del
                        Jugador</h2>
                </div>

                <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                    <form class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Nombre</label>
                            <div class="mt-2">
                                <input type="text" disabled name="name" id="name" autocomplete="name"
                                    value="{{ $player->name }}"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-2">
                            </div>
                        </div>

                        <div>
                            <label for="money" class="block text-sm font-medium leading-6 text-gray-900">Saldo</label>
                            <div class="mt-2">
                                <input type="number" disabled name="money" id="money" autocomplete="money"
                                    value="{{ $player->money }}"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 px-2">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
