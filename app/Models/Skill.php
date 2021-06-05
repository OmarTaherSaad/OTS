<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'name', 'percentage', 'bar_size', 'bar_color', 'bg_color', 'font_color'
    ];
}
