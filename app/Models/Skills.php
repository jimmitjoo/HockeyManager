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
        'discipline',
        'endurance',
        'durability',
        'bodyChecking',
        'offensiveAwareness',
        'puckControl',
        'speed',
        'passing',
        'stickChecking',
        'shotBlocking',
        'vision',
        'slapshotAccuracy',
        'slapshotPower',
        'wristshotAccuracy',
        'wristshotPower',
    ];

    public function faceOffs(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                return round((
                    $attributes['faceOffs'] +
                    ($attributes['aggressiveness']/2) +
                    ($attributes['strength']/2) +
                    ($attributes['balance']/2) +
                    ($attributes['agility']/3)) / 2.83);
            }
        );
    }

    public function defendNeutralZone(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                return round(
                    ($attributes['defenseAwareness'] +
                        ($attributes['discipline']/2) +
                        ($attributes['endurance']/2) +
                        ($attributes['durability']/2) +
                        ($attributes['bodyChecking']/3)) / 2.83);
            }
        );
    }

    public function attackNeutralZone(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                return round((
                    $attributes['offensiveAwareness'] +
                    $attributes['puckControl'] +
                    ($attributes['speed']/2) +
                    ($attributes['passing']/2) +
                    ($attributes['endurance']/3)) / 3.33);
            }
        );
    }

    public function defendInZone(): Attribute
    {
        return Attribute::make(
            get: function($value, $attributes) {
                return round((
                    $attributes['defenseAwareness'] +
                    ($attributes['aggressiveness']/2) +
                    ($attributes['shotBlocking']/2) +
                    ($attributes['stickChecking']/2) +
                    ($attributes['discipline']/2) +
                    ($attributes['bodyChecking']/2)) / 3.5);
            }
        );
    }

    public function attackInZone(): Attribute
    {
        return Attribute::make(
            get: function($value, $attributes) {
                return round((
                        $attributes['offensiveAwareness'] +
                        ($attributes['aggressiveness']/2) +
                        ($attributes['puckControl']/2) +
                        ($attributes['agility']/2) +
                        ($attributes['passing']/2) +
                        ($attributes['vision']/2)) / 3.5);
            }
        );
    }

    public function shooting(): Attribute
    {
        return Attribute::make(
            get: function($value, $attributes) {
                return round((
                        $attributes['wristshotPower'] +
                        $attributes['wristshotAccuracy'] +
                        $attributes['slapshotPower'] +
                        $attributes['slapshotAccuracy'] +
                        ($attributes['offensiveAwareness']/2) +
                        ($attributes['puckControl']/2) +
                        ($attributes['agility']/3) +
                        ($attributes['strength']/3) +
                        ($attributes['vision']/3)) / 6);
            }
        );
    }

    public function goaltending(): Attribute
    {
        return Attribute::make(
            get: function($value, $attributes) {
                return round((
                        $attributes['reflexes'] +
                        $attributes['agility'] +
                        $attributes['vision'] +
                        $attributes['aggressiveness'] +
                        $attributes['endurance'] +
                        $attributes['passing']/2 +
                        $attributes['speed']) / 5.5);
            }
        );
    }
}
