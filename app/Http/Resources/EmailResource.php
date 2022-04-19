<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class EmailResource extends JsonResource
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
            'correo_from'=>$this->correo_from,
            'correo_to'=>$this->correo_to,
            'name'=>$this->name,
            'asunto'=>$this->asunto,
            'ciudad'=>$this->ciudad,
            'body'=>$this->body,
            'created_at'=>Carbon::parse($this->created_at)->diffForHumans()
        ];
    }

}
