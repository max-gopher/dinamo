<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function list(Request $request)
    {
        // TODO Разобратьсяс датой игр
        return $this->success([
            'items' => Game::whereYear('date', 2021)->get()
        ]);
    }

    public function get($id)
    {

    }
}
