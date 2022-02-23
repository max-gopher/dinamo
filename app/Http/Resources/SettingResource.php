<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use JetBrains\PhpStorm\ArrayShape;

class SettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    #[ArrayShape(['club_name' => "mixed", 'club_logo' => "mixed"])]
    public function toArray($request): array|\JsonSerializable|\Illuminate\Contracts\Support\Arrayable
    {
        return [
            'club_name' => $this->club_name,
            'club_logo' => !empty($this->club_logo) ? Storage::disk('clubs')->url($this->club_logo) : null
        ];
    }
}
