<?php

namespace App\Support;

use Carbon\Carbon;

/**
 * Class WebHelpers
 *
 * @package App\Support
 */
class WebHelpers
{
    /**
     * function description
     *
     * @param $image
     * @return string
     */
    public static function imageUrl($image): string
    {
        return config('domains.image_url') . '/file/' . $image;
    }

    /**
     * function description
     *
     * @return int
     */
    public static function uniqueNumberByTime(): int
    {
        $now = Carbon::now();

        return intval($now->getPreciseTimestamp(6));
    }
}
