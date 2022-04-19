<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image_slider_p extends Model
{
    use HasFactory;

    protected $table='image_slider_p';
    protected  $guarded = ['id', 'created_at', 'updated_at'];

    public function slider_principal(){
        return $this->belongsTo(slider_principal::class);
    }

}
