<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paginas extends Model
{
    use HasFactory;
    protected $table = 'paginas';
    protected $fillable = ['titulo', 'titulo2', 'titulo3','sub_titulo','img_url','img_url_2'];

    public function block(){
        return $this->hasMany(blocks::class);
    }
}
