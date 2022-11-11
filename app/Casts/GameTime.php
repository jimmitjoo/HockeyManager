<?php

namespace App\Casts;

class GameTime
{
    public function get($model, string $key, $value, array $attributes)
    {
        $minutes = floor($value / 60);
        $seconds = $value - ($minutes * 60);

        if ($minutes < 10) {
            $minutes = '0' . $minutes;
        }

        if ($seconds < 10) {
            $seconds = '0' . $seconds;
        }

        return $minutes . ':' . $seconds;
    }

    public function set($model, string $key, $value, array $attributes)
    {
        return $value;
    }
}
