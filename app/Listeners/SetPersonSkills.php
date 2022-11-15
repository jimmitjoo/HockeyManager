<?php

namespace App\Listeners;

use App\Models\Skills;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SetPersonSkills
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Skills::factory()->create([
            'person_id' => $event->person->id,
        ]);
    }
}
