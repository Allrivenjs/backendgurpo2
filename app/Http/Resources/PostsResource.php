<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use function Symfony\Component\Translation\t;

class PostsResource extends JsonResource
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
           'titulo'=>$this->name,
           'slug'=>$this->slug,
           'extract'=>$this->extract,
           'body'=>$this->body,
           'status'=>$this->status,
           'created_at'=>Carbon::parse($this->created_at)->diffForHumans(),
           'updated_at'=>Carbon::parse($this->updated_at)->diffForHumans(),
           'image'=>$this->image?->url,
           'tags'=>$this->tags,
           'category'=>$this->category,
       ];
    }
}
