<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $this->resource->toArray($request)[] = [
            'home_team' => TeamResource::make($this->homeTeam),
            'away_team' => TeamResource::make($this->awayTeam),
        ];

        return $this->resource->toArray($request);
    }
}
