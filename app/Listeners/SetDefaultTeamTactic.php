<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetDefaultTeamTactic
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $players = $event->team->players()->take(22)->get()->shuffle();

        $event->team->tactic()->create([
            'goalkeeper_id' => $players->shift()->id,
            'goalkeeper_backup_id' => $players->shift()->id,

            'line_1_left_forward_id' => $players->shift()->id,
            'line_1_center_id' => $players->shift()->id,
            'line_1_right_forward_id' => $players->shift()->id,
            'line_1_left_defender_id' => $players->shift()->id,
            'line_1_right_defender_id' => $players->shift()->id,

            'line_2_left_forward_id' => $players->shift()->id,
            'line_2_center_id' => $players->shift()->id,
            'line_2_right_forward_id' => $players->shift()->id,
            'line_2_left_defender_id' => $players->shift()->id,
            'line_2_right_defender_id' => $players->shift()->id,

            'line_3_left_forward_id' => $players->shift()->id,
            'line_3_center_id' => $players->shift()->id,
            'line_3_right_forward_id' => $players->shift()->id,
            'line_3_left_defender_id' => $players->shift()->id,
            'line_3_right_defender_id' => $players->shift()->id,

            'line_4_left_forward_id' => $players->shift()->id,
            'line_4_center_id' => $players->shift()->id,
            'line_4_right_forward_id' => $players->shift()->id,
            'line_4_left_defender_id' => $players->shift()->id,
            'line_4_right_defender_id' => $players->shift()->id,
        ]);
    }
}
