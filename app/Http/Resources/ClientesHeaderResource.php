<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientesHeaderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
        return [
            'titulo'=>$this->title1,
            'titulo2'=>$this->title2,
            'sub_titulo'=>$this->sub_title,
            '_content'=>$this->content,
            'img_url'=>$this->img_url_fondo
        ];
    }
}
