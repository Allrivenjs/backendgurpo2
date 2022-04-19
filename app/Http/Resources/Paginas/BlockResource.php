<?php

namespace App\Http\Resources\Paginas;

use App\Models\paginas_items;
use Illuminate\Http\Resources\Json\JsonResource;

class BlockResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id'=>$this->id,
            'content'=>$this->content,
            'img_url'=>$this->img_url
        ];
    }
}
