<?php

namespace Database\Factories;

use App\Models\Person;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Skills>
 */
class SkillsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $person = Person::factory()->make();
        return [
            'person_id' => null,
            'faceOffs' => $this->faker->numberBetween(0, 100),
            'aggressiveness' => $this->faker->numberBetween(0, 100),
            'strength' => $this->faker->numberBetween(0, 100),
            'balance' => $this->faker->numberBetween(0, 100),
            'agility' => $this->faker->numberBetween(0, 100),
            'defenseAwareness' => $this->faker->numberBetween(0, 100),
            'dicipline' => $this->faker->numberBetween(0, 100),
            'endurance' => $this->faker->numberBetween(0, 100),
            'durability' => $this->faker->numberBetween(0, 100),
            'bodyChecking' => $this->faker->numberBetween(0, 100),
            'offensiveAwareness' => $this->faker->numberBetween(0, 100),
            'speed' => $this->faker->numberBetween(0, 100),
            'passing' => $this->faker->numberBetween(0, 100),
            'puckControl' => $this->faker->numberBetween(0, 100),
        ];
    }
}
