<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Quienessomosresource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id'=>$this->id,
            'titulo'=>$this->title1,
            'titulo2'=>$this->title2,
            'titulo3'=>$this->title3,
            'sub_titulo'=>$this->sub_title,
            'sub_titulo2'=>$this->sub_title2,
            '_content'=>$this->content1,
            'img_fondo'=>$this->img_url_fondo,
            'img'=>$this->img_url,
        ];
    }
}
