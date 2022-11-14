<?php

namespace Database\Factories;

use App\Statuses\CompetitionStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Competition>
 */
class CompetitionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $startsAt = $this->faker->dateTimeBetween('-1 year', '+1 year');
        return [
            'name' => $this->faker->company,
            'state' => $this->faker->state,
            'country' => $this->faker->countryCode,
            'status' => CompetitionStatus::NotStarted,
            'starts_at' => $startsAt,
            'ends_at' => $startsAt->modify('+2 months'),
            'meetings' => 2,
        ];
    }
}
