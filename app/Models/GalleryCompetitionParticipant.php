<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryCompetitionParticipant extends Model
{
    use HasFactory;
    protected $fillable = ['competition_participant_id', 'image_url'];
}
