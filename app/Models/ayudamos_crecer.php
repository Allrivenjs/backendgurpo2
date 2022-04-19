<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ayudamos_crecer extends Model
{
    use HasFactory;

    protected $table = 'ayudamos_crecer';

    protected $fillable = ['title_ac', 'description_ac'];

    public function Slider_ayudamos_crecer(){
        return $this->hasMany(Slider_ayudamos_crecer::class);
    }
}
