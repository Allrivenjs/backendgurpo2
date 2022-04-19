<?php

namespace App\Http\Resources\Paginas;

use App\Http\Resources\DataCollection;
use App\Models\eq_human_items;
use App\Models\items_carteleras;
use Illuminate\Http\Resources\Json\JsonResource;

class cartelerasDResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $items=eq_human_items::query()->where('pertenece_id', $this->id)->get();
        return [
            'id'=>$this->id,
            'titulo'=>$this->titulo,
            'titulo2'=>$this->titulo2,
            'sub_titulo'=>$this->sub_titulo,
            'img_url'=>$this->img_url,
            'img_url_2'=>$this->img_url_2,
            'blocks'=> new DataCollection($items)
        ];
    }
}
