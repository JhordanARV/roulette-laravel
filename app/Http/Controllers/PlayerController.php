<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::paginate(5);
        return view('players.index', compact('players'));
    }

    public function create()
    {
        return view('players.create');
    }

    public function show($id)
    {
        $player = Player::find($id);
        return view('players.show', compact('player'));
    }

    public function edit(Player $player)
    {
        $player = Player::find($player->id);
        return view('players.edit', compact('player'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50|min:5',
            'money' => 'required',
        ]);

        if ($request->money < 0) {
            return redirect()->route('players.create')->with('error', 'Money must be greater than 0.');
        }



        $player = new Player();
        $player->name = $request->name;
        $player->money = $request->money;
        $player->save();

        return redirect()->route('players.show', $player->id)->with('success', 'Player created successfully.');
    }

    public function update(Request $request, Player $player)
    {
        $request->validate([
            'name' => 'required',
            'money' => 'required',
        ]);

        $player = Player::find($player->id);
        $player->name = $request->name;
        $player->money = $request->money;
        $player->save();

        return redirect()->route('players.show', $player->id)->with('success', 'Player updated successfully.');
    }

    public function destroy(Player $player)
    {
        $player = Player::find($player->id);
        $player->delete();

        return redirect()->route('players.index')->with('success', 'Player deleted successfully.');
    }
}
