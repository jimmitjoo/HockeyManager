<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tactic extends Model
{
    use HasFactory;

    protected $fillable = [
        'goalkeeper_id',
        'goalkeeper_backup_id',

        'line_1_left_forward_id',
        'line_1_center_id',
        'line_1_right_forward_id',
        'line_1_left_defender_id',
        'line_1_right_defender_id',

        'line_2_left_forward_id',
        'line_2_center_id',
        'line_2_right_forward_id',
        'line_2_left_defender_id',
        'line_2_right_defender_id',

        'line_3_left_forward_id',
        'line_3_center_id',
        'line_3_right_forward_id',
        'line_3_left_defender_id',
        'line_3_right_defender_id',

        'line_4_left_forward_id',
        'line_4_center_id',
        'line_4_right_forward_id',
        'line_4_left_defender_id',
        'line_4_right_defender_id',
    ];

    public function goalkeeper(): BelongsTo
    {
        return $this->belongsTo(Person::class, 'goalkeeper_id');
    }

    public function goalkeeperBackup(): BelongsTo
    {
        return $this->belongsTo(Person::class, 'goalkeeper_backup_id');
    }

    public function line1LeftForward(): BelongsTo
    {
        return $this->belongsTo(Person::class, 'line_1_left_forward_id');
    }

    public function line1Center(): BelongsTo
    {
        return $this->belongsTo(Person::class, 'line_1_center_id');
    }

    public function line1RightForward(): BelongsTo
    {
        return $this->belongsTo(Person::class, 'line_1_right_forward_id');
    }

    public function line1LeftDefender(): BelongsTo
    {
        return $this->belongsTo(Person::class, 'line_1_left_defender_id');
    }

    public function line1RightDefender(): BelongsTo
    {
        return $this->belongsTo(Person::class, 'line_1_right_defender_id');
    }
}
