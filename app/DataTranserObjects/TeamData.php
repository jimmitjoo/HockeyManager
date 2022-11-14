<?php

namespace App\DataTranserObjects;

class TeamData
{
    public function __construct(
        public string $name,
        public string $city,
        public string $state,
        public string $country,
    ) {
    }
}
