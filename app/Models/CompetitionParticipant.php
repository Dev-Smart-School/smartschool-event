<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionParticipant extends Model
{
    use HasFactory;
    protected $fillable = ['competition_id', 'user_id','description', 'url', 'image', 'status'];
}
