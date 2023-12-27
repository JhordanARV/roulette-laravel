@extends('layouts.template')

@section('title', 'Home')

@section('content')
    <h2 class="text-2xl">Bienvenido!</h2>
    <p>Pagina de apuestas</p>
    <div class="flex p-5 justify-end">
        <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"" href="{{ route('players.index') }}">Jugadores</a>
    </div>
    <table class="border-separate border-spacing-1 border border-slate-500">
        <thead>
            <tr class="p-2">
                <th class="border border-slate-600">Jugador</th>
                <th class="border border-slate-600">Apuesta</th>
                <th class="border border-slate-600">Monto</th>
                <th class="border border-slate-600">Recompensa</th>
                <th class="border border-slate-600">Saldo Actual</th>
                <th class="border border-slate-600">Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($results as $result)
                <tr>
                    <td class="border border-slate-700">{{ $result['name'] }}</td>
                    <td class="border border-slate-700"
                        @if ($result['bet'] == 'Negro') style="background-color: black; color: white;"
                @elseif ($result['bet'] == 'Rojo')
                style="background-color: red; color: white;"
                @elseif ($result['bet'] == 'Verde')
                style="background-color: green; color: white;" @endif>
                        {{ $result['bet'] }}</td>
                    <td class="border border-slate-700">$ {{ $result['betAmount'] }}</td>
                    <td class="border border-slate-700">$ {{ $result['result'] }}</td>
                    <td class="border border-slate-700">$ {{ $result['money'] }}</td>
                    <td
                        @if ($result['money'] > 1000) style="background-color: green;"
                        @elseif ($result['money'] > 1000 && $result['money'] < 5000) style="background-color: yellow;"
                        @elseif ($result['money'] <= 1000) style="background-color: red;"
                        @endif>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="flex justify-center m-5 flex-row">
        <div class="w-60 h-60 rounded-full flex items-center justify-center"
            @if ($result['roulette'] == 'Negro') style="background-color: black; color: white;"
    @elseif ($result['roulette'] == 'Rojo')
    style="background-color: red; color: white;"
    @elseif ($result['roulette'] == 'Verde')
    style="background-color: green; color: white;" @endif>
            @if ($result['roulette'] == 'Negro')
                <p class="text-4xl">NEGRO</p>
            @elseif ($result['roulette'] == 'Rojo')
                <p class="text-4xl">ROJO</p>
            @elseif ($result['roulette'] == 'Verde')
                <p class="text-4xl">VERDE</p>
            @endif
        </div>
        <h3>RESULTADO RULETA</h3>
    </div>


@endsection
