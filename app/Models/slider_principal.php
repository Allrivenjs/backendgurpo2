<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slider_principal extends Model
{
    use HasFactory;

    protected $table='slider_principal';
    protected $fillable =['title_slider','subtitle_slider','link_button_slider','Url_image'];


    function image(){
        return $this->hasOne(image_slider_p::class);
    }


}
