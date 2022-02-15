<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TourResource;
use App\Models\Game;
use App\Models\Season;
use App\Models\Setting;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SeasonController extends Controller
{
    public function table (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'seasonId' => 'required'
        ]);
        if ($validator->fails()) {
            return $this->error(__('Некорректные данные'));
        }

        $season_id = $request->get('seasonId');

        $season = Season::find($season_id);
        if (empty($season)) {
            return $this->error(__('Некорректные данные'));
        }


        $win_query = Game::select(\DB::raw('COUNT(id) as win'))
            ->where('season_id', '=', $season_id)
            ->whereColumn('our_score', '>', 'opponent_score')
            ->getQuery();
        $fail_query = Game::select(\DB::raw('COUNT(id)'))
            ->where('season_id', '=', $season_id)
            ->whereColumn('opponent_score', '>', 'our_score')
            ->getQuery();
        $scored_query = Game::select(\DB::raw('SUM(our_score)'))
            ->where('season_id', '=', $season_id)
            ->getQuery();
        $conceded_query = Game::select(\DB::raw('SUM(opponent_score)'))
            ->where('season_id', '=', $season_id)
            ->getQuery();
        $draw_query = Game::select(\DB::raw('COUNT(id) as draw'))
            ->where('season_id', '=', $season_id)
            ->whereColumn('opponent_score', '=', 'our_score')
            ->getQuery();
        $score_query = Game::select(
            \DB::raw(($win_query->first()->win * 3) + ($draw_query->first()->draw * 1) . ' as score')
        )
            ->where('season_id', '=', $season_id)->groupBy('season_id')
            ->getQuery();

        $our_row = Game::select([
            \DB::raw('COUNT(id) as games'),
            'win' => $win_query,
            'fail' => $fail_query,
            'draw' => $draw_query,
            'scored' => $scored_query,
            'conceded' => $conceded_query,
            'score' => $score_query
        ])
            ->where('season_id', '=', $season_id)
            ->groupBy('season_id')
            ->first();

        $table = $season->tour()->with('club')->get();

        $our_row->club = Setting::select(['club_name as name', 'club_logo as logo'])->first();

        return $this->success([
            'items' => TourResource::collection($table->push($our_row)->sortByDesc('score'))->resolve()
        ]);
    }
}
