<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'category_competition_id','description', 'start_date', 'end_date', 'image_url', 'juknis_url', 'status'];
}
