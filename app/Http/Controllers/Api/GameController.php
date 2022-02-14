<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function list(Request $request)
    {
        $year = $request->get('year', now()->year);
        $games = Game::past()->whereYear('date', $year)->with('season.league', 'opponent')->get();

        // TODO Разобратьсяс датой игр
        return $this->success([
            'items' => $games
        ]);
    }

    public function get($id)
    {

    }
}
