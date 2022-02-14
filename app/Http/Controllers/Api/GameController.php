<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function list(Request $request)
    {
        $year = $request->get('year', now()->year);
        $count_actual_games = Game::past()->whereYear('date', $year)->count();
        $games = Game::past()
            ->when($count_actual_games >= self::$perPage, function ($query) use ($year) {
                $query->whereYear('date', $year);
            })
            ->orderByDesc('date')
            ->with('season.league', 'opponent')
            ->limit(self::$perPage)
            ->get();

        $result = $games->groupBy(function ($item) {
            return Helper::monthWord($item->date->month) . ' ' . $item->date->year;
        });

        return $this->success([
            'items' => $result
        ]);
    }

    public function get($id)
    {

    }
}
