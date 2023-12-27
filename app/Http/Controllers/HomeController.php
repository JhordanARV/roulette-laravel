<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function __invoke()
    {

        $players = Player::all();

        $results = [];

        $resultRoulette = $this->spinroulette();
        foreach ($players as $player) {

            if ($player->money <= 0) {
                continue;
            }

            $bet = $this->calculateBet($player->money);
            $betPlayer = $this->chooseBet();

            $result = $this->calculateResult($bet, $betPlayer, $resultRoulette);

            $player->money += $result - $bet;

            $player->save();

            $results[] = [
                'name' => $player->name,
                'bet' => $betPlayer,
                'betAmount' => number_format(floatval($bet), 2, '.', ''),
                'result' => number_format(floatval($result), 2, '.', ''),
                'roulette' => $resultRoulette,
                'money' => number_format(floatval($player->money), 2, '.', '')
            ];
        }

        return view('home', compact('results'));
    }

    function calculateBet($money) {
        $minimumBet = 0.08;
        $maximumMaxima = 0.15;
        $bet = $money * (mt_rand($minimumBet * 100, $maximumMaxima * 100) / 100);

        if ($money <= 1000) {
            $bet = $money;
        }
        return $bet;
    }

    public function chooseBet()
    {
        $options = ['Verde', 'Rojo', 'Negro'];
        $probabilities = [2, 49, 49];

        $randomNumber = mt_rand(1, 100);
        $accumulator = 0;

        foreach ($probabilities as $index => $probability) {
            $accumulator += $probability;

            if ($randomNumber <= $accumulator) {
                return $options[$index];
            }
        }
    }

    public function spinroulette()
    {
        $options = ['Verde', 'Rojo', 'Negro'];
        $probabilities = [2, 49, 49];

        $randomNumber = mt_rand(1, 100);
        $accumulator = 0;

        foreach ($probabilities as $index => $probability) {
            $accumulator += $probability;

            if ($randomNumber <= $accumulator) {
                return $options[$index];
            }
        }
    }

    public function calculateResult($bet, $betPlayer, $resultRoulette)
    {
        if ($betPlayer === $resultRoulette) {
            if ($resultRoulette === 'Verde') {
                return $bet * 15;
            } else {
                return $bet * 2;
            }
        } else {
            return 0;
        }
    }
}
