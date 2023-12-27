@extends('layouts.template')

@section('title', 'Jugadores')

@section('content')
    <div class="flex p-5 justify-end gap-2">
        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded""
            href="{{ route('players.create') }}">Crear Jugador</a>
            <a class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded""
            href="{{ route('home') }}">Ir a Jugar</a>
    </div>
    <div class="flex justify-end items-center flex-col">
        <h2 class="text-2xl">Lista de Jugadores</h2>
        <ul role="list" class="w-1/2 divide-y divide-gray-100">
            @foreach ($players as $player)
                <li class="flex justify-between gap-x-6 py-5 pointer hover:bg-gray-50"
                    onclick="window.location='{{ route('players.show', $player->id) }}';">
                    <div class="flex min-w-0 gap-x-4">
                        <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                            src="https://th.bing.com/th?id=OIF.tigVCvFQoRDMHQcIvAl%2fZA&rs=1&pid=ImgDetMain" alt="">
                        <div class="min-w-0 flex-auto">
                            <p class="text-sm font-semibold leading-6 text-gray-900">{{ $player->name }}</p>
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">Saldo: $ {{ $player->money }}</p>
                        </div>
                    </div>
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                        <p class="text-sm leading-6 text-gray-900">Creado: <time>{{ $player->created_at }}</time></p>
                        <p class="mt-1 text-xs leading-5 text-gray-500">Actualizado: <time>{{ $player->updated_at }}</time>
                        </p>
                    </div>
                </li>
            @endforeach
        </ul>
        {{ $players->links() }}
    </div>

@endsection
