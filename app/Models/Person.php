<?php

namespace App\Models;

use App\Events\PersonCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'age',
        'name',
        'city',
        'country',
    ];

    protected $dispatchesEvents = [
        'created' => PersonCreated::class,
    ];

    public function team(): BelongsToMany
    {
        return $this->belongsToMany(Team::class)->whereNull('resigned_at');
    }

    public function skills(): HasOne
    {
        return $this->hasOne(Skills::class);
    }
}
