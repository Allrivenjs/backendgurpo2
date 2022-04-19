<?php

namespace App\Http\Resources;

use App\Models\eq_human_items;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\DataCollection;

class TeamHumanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        'items'=>new DataCollection($items_team_human)
        $items_team_human=eq_human_items::query()->where('pertenece_id', $this->id)->get();

        return [
            'id'=>$this->id,
            'title_team'=>$this->title_team,
            'subtitle_team'=>$this->subtitle_team,
            'url1'=>$this->url1,
            'items'=>new DataCollection($items_team_human),
        ];
    }
}
