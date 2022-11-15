<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'faceOffs',
        'aggressiveness',
        'strength',
        'balance',
        'agility',
        'defenseAwareness',
        'dicipline',
        'endurance',
        'durability',
        'bodyChecking',
        'offensiveAwareness',
        'puckControl',
        'speed',
        'passing',
    ];

    public function faceOffs(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                return round(($attributes['faceOffs'] + ($attributes['aggressiveness']/2) + ($attributes['strength']/2) + ($attributes['balance']/2) + ($attributes['agility']/3)) / 2.83);
            }
        );
    }

    public function defendNeutralZone(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                return round(($attributes['defenseAwareness'] + ($attributes['dicipline']/2) + ($attributes['endurance']/2) + ($attributes['durability']/2) + ($attributes['bodyChecking']/3)) / 2.83);
            }
        );
    }

    public function attackNeutralZone(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                return round(($attributes['offensiveAwareness'] + $attributes['puckControl'] + ($attributes['speed']/2) + ($attributes['passing']/2) + ($attributes['endurance']/3)) / 3.33);
            }
        );
    }
}
