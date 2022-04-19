<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider_ayudamos_crecer extends Model
{
    use HasFactory;

    protected $table = 'Slider_ayudamos_crecer';
    protected $fillable = ['estrellas', 'author', 'profession', 'comment', 'ayudC_id'];

    public function ayudamos_crecer(){
        return $this->belongsTo(ayudamos_crecer::class);
    }
}
