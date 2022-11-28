<?php

namespace App\Http\Resources;

use App\Types\CompetitionType;
use Illuminate\Http\Resources\Json\JsonResource;

class CompetitionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'country' => $this->country,
            'status' => $this->status,
            'starts_at' => $this->starts_at,
            'ends_at' => $this->ends_at,
            'type' => $this->type,
            'max_teams' => $this->max_teams,
            'meetings' => $this->meetings,
        ];

        if ($this->whenLoaded('teams')) {
            $data['teams'] = TeamResource::collection($this->teams);
        }

        if ($this->type === CompetitionType::League) {
            $data['table'] = $this->leagueTable;
        }

        return $data;
    }
}
