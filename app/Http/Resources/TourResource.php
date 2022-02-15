<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TourResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $result = [
            'logo' => $this->club->logo,
            'name' => $this->club->name,
            'results' => [
                'games' => $this->games,
                'win' => $this->win,
                'draw' => $this->draw,
                'loose' => $this->fail,
                'score' => $this->scored . '-' . $this->conceded,
                'points' => $this->score
            ]
        ];

        return $result;
    }
}
