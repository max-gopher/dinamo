<?php

namespace App\Http\Resources;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection as SupportCollection;
use JetBrains\PhpStorm\ArrayShape;

/**
 * @property mixed|Collection|SupportCollection $staffs
 * @property mixed|Collection|SupportCollection $players
 */
class TeamResource extends JsonResource
{
    #[ArrayShape(['players' => "\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|mixed", 'stuff' => "\Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|mixed"])]
    public function toArray($request): array
    {
        return [
            'players' => $this->players,
            'stuff' => $this->staffs
        ];
    }
}
