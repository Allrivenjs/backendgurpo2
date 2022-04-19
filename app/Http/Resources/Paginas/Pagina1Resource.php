<?php

namespace App\Http\Resources\Paginas;

use App\Models\blocks;
use Illuminate\Http\Resources\Json\JsonResource;

class Pagina1Resource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $blocks = blocks::query()->where('paginas_id', $this->id)->get();
        return [
            'id'=>$this->id,
            'titulo'=>$this->titulo,
            'titulo2'=>$this->titulo2,
            'sub_titulo'=>$this->sub_titulo,
            'img_url'=>$this->img_url,
            'blocks'=> BlockResource::collection($blocks)
        ];
    }
}
