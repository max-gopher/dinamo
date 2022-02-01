<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Player;
use App\Models\Staff;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\ArrayShape;

class TeamController extends Controller
{
    #[ArrayShape(['players' => "\App\Models\Player[]|\Illuminate\Database\Eloquent\Collection", 'stuff' => "\App\Models\Staff[]|\Illuminate\Database\Eloquent\Collection"])]
    public function list (): array
    {
        return [
            'players' => Player::all(),
            'stuff' => Staff::all()
        ];
    }
}
