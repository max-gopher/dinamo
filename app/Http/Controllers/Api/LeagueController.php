<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\League;
use Illuminate\Http\Request;

class LeagueController extends Controller
{

    public function list(): \Illuminate\Http\JsonResponse
    {
        return $this->success([
            'items' => League::all()
        ]);
    }

    public function get(Request $request): \Illuminate\Http\JsonResponse
    {
        $result = [];

        $leagues = League::select()->get();

        return $this->success([
            'items' => $result
        ]);
    }
}
