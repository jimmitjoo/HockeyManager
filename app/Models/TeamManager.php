<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamManager extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'manager_id',
        'became_manager_at',
        'resigned_at',
    ];

    public $timestamps = false;
}
