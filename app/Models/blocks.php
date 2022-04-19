<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blocks extends Model
{
    use HasFactory;
    protected $table='blocks';
    protected $fillable=['content','img_url','paginas_id'];


    public function paginas(){
        return $this->belongsTo(paginas::class);
    }

}
