<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table='categories';
    protected $fillable = ['name','slug'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    public function getRouteKeyName()
    {
        return "slug";
    }

    //Relacion uno a muchos

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
