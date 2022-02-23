<?php

namespace App\Http\Controllers\Api;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\League;
use App\Models\Season;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    public function list(Request $request): JsonResponse
    {
        $filters = $this->getFilters();
        $season_id = $request->get('seasonId');
        if (empty($season_id)) {
            $season_id = optional($filters['seasons']->first())->id;
        }

        $games = Game::past()
            ->where('season_id', '=', $season_id)
            ->orderByDesc('date')
            ->with('season.league', 'opponent')
            ->get()
            ->transform(function ($game) {
                if (!empty($game->opponent->logo)) {
                    $game->opponent->logo = Storage::disk('clubs')->url($game->opponent->logo);
                }
                return $game;
            });

        $result = $games->groupBy(function ($item) {
            return Helper::monthWord($item->date->month) . ' ' . $item->date->year;
        });

        return $this->success([
            'items' => $result,
            'filters' => $this->getFilters()
        ]);
    }

    public function last(): JsonResponse
    {
        $game = Game::past()->with('season.league', 'opponent')->orderByDesc('date')->first();

        if (!empty($game->opponent->logo)) {
            $game->opponent->logo = Storage::disk('clubs')->url($game->opponent->logo);
        }

        return $this->success([
            'item' => $game
        ]);
    }

    public function future(): JsonResponse
    {

        $games = Game::future()
            ->orderByDesc('date')
            ->limit(3)
            ->get()
            ->transform(function ($game) {
                if (!empty($game->opponent->logo)) {
                    $game->opponent->logo = Storage::disk('clubs')->url($game->opponent->logo);
                }
                return $game;
            });

        return $this->success([
            'items' => $games
        ]);
    }

    protected function getFilters(): array
    {
        $league_ids = League::select('id')->whereHas('seasons.games_past')->getQuery();
        $seasons = Season::whereIn('league_id', $league_ids)
            ->with('league')
            ->orderByDesc('year')
            ->get()
            ->transform(function ($item) {
                $item->is_selected = $item->selected;
                return $item;
            });

        return [
            'seasons' => $seasons
        ];
    }
}
