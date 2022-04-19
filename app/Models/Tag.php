<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table='tags';
    protected $fillable = ['name', 'slug','color'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function getRouteKeyName()
    {
        return "slug";
    }


    //relacion muchos a muchos
    function posts(){
        return $this->belongsToMany(Post::class);
    }
}
