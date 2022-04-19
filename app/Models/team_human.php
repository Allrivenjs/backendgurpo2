<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class team_human extends Model
{
    use HasFactory;

    protected $table='team_human';
    protected $fillable = ['title_team', 'subtitle_team', 'url1',];


}
