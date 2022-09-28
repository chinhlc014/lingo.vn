<?php

use Carbon\Carbon;
use Facades\App\Support\Formatter;
use Symfony\Component\HttpFoundation\File\UploadedFile;

if (!function_exists('array_key_by')) {
    /**
     * Replace root array key with child array key.
     * Note that the specified key must exist in the query result, or it will be ignored.
     *
     * @param array $data
     * @param string $key
     * @return array
     */
    function array_key_by(array $data, $key)
    {
        $output = [];

        foreach ($data as $k => $value) {
            $output[(isset($value[$key])) ? $value[$key] : $k] = $value;
        }

        return $output;
    }
}

if (!function_exists('datetime')) {
    /**
     * Parse datetime with Carbon.
     *
     * @param mixed $time
     * @param string $timezone
     * @param bool $reverse
     * @return \Carbon\Carbon
     */
    function datetime($time = null, $timezone = null, $reverse = false)
    {
        $timezone = in_array($timezone, timezone_identifiers_list()) ? $timezone : null;

        if (is_array($time)) {
            list($time, $format) = $time;
            $datetime = Carbon::createFromFormat($format, $time, $timezone);
        } else {
            $datetime = Carbon::parse($time, $timezone);
        }

        return $reverse ? $datetime->tz(config('app.timezone', 'UTC')) : $datetime;
    }
}

if (!function_exists('prd')) {
    /**
     * Print the passed variables and end the script.
     *
     * @param mixed $x
     * @return void
     */
    function prd()
    {
        array_map(function ($x) {
            echo '<pre>';
            print_r($x);
            echo '</pre>';
        }, func_get_args());
        die;
    }
}

if (!function_exists('vd')) {
    /**
     * Dump the passed variables using var_dump and end the script.
     *
     * @param mixed $x
     * @return void
     */
    function vd()
    {
        array_map(function ($x) {
            var_dump($x);
            die;
        }, func_get_args());
    }
}

if (!function_exists('random_filename')) {
    /**
     * Generate random filename.
     *
     * @param mixed $file
     * @param int $length
     * @param Closure|null
     * @return string
     */
    function random_filename($file, $length = 20, Closure $closure = null)
    {
        if ($file instanceof UploadedFile) {
            $extension = $file->getClientOriginalExtension();
        } else {
            $extension = pathinfo($file, PATHINFO_EXTENSION);
        }

        $name = str_random($length);

        if ($closure) {
            $name = $closure($name);
        }

        return $name . '.' . $extension;
    }
}

if (!function_exists('page_title')) {
    /**
     * Set the page title.
     *
     * @param string $title
     * @param string $delimiter
     * @param string|null $defaultTitle
     * @return string
     */
    function page_title($title, $delimiter = '|', $defaultTitle = null)
    {
        $defaultTitle = $defaultTitle ?: config('app.name');

        if (!$title || $title == $defaultTitle) {
            return $defaultTitle;
        }

        return $title . ' ' . $delimiter . ' ' . $defaultTitle;
    }
}

if (!function_exists('active_route')) {
    /**
     * Return the "active" class if current route is matched.
     *
     * @param string|array $route
     * @param string $output
     * @return string|null
     */
    function active_route($route, $output = 'active')
    {
        if (is_array($route)) {
            if (call_user_func_array('Route::is', $route)) {
                return $output;
            }
        } else {
            if (Route::is($route)) {
                return $output;
            }
        }
    }
}

if (!function_exists('user')) {
    /**
     * Get current authenticated user.
     *
     * @param string|null $guard
     * @return \Illuminate\Foundation\Auth\User|null
     */
    function user($guard = null)
    {
        return auth($guard)->user();
    }
}

if (!function_exists('image_cache_url')) {
    /**
     * Generate image cache url.
     *
     * @param string $path
     * @param string $size
     * @return string
     */
    function image_cache_url($path, $size = 'original')
    {
        $path = $path ?: 'no_image.png';
        $size = in_array($size, array_keys(config('imagecache.templates', []))) ? $size : 'original';

        return route('imagecache', [$size, $path]);
    }
}

if (!function_exists('money')) {
    /**
     * Get the money instance.
     *
     * @param mixed $amount
     * @param string $currency
     * @return \Money\Money
     */
    function money($amount, $currency)
    {
        return sprintf('%s %s', number_format($amount), $currency);
        // return Formatter::money($amount, $currency);
    }
}

if (!function_exists('swal')) {
    /**
     * Sweetalert configuration data.
     *
     * @param string|array $title
     * @param string|null $text
     * @param string|null $type
     * @return array
     */
    function swal($title, $text = null, $type = null)
    {
        if (is_array($title)) {
            return $title;
        }

        return [
            'title' => $title,
            'html' => $text,
            'type' => $type,
        ];
    }
}

if (!function_exists('time_range')) {
    /**
     * Formatting time range.
     *
     * @param mixed $start
     * @param mixed $time
     * @param string $rangeFormat
     * @return string
     */
    function time_range($start, $end, string $rangeFormat = '%s-%s')
    {
        return Formatter::timeRage($start, $end, $rangeFormat);
    }
}
if (!function_exists('number_shorten')) {
    /**
     * function description
     *
     * @param $number
     * @param int $precision
     * @param null $divisors
     * @return string
     */
    function number_shorten($number, $precision = 3, $divisors = null)
    {

        // Setup default $divisors if not provided
        if (!isset($divisors)) {
            $divisors = [
                pow(1000, 0) => '', // 1000^0 == 1
                pow(1000, 1) => 'K', // Thousand
                pow(1000, 2) => 'M', // Million
                pow(1000, 3) => 'B', // Billion
                pow(1000, 4) => 'T', // Trillion
                pow(1000, 5) => 'Qa', // Quadrillion
                pow(1000, 6) => 'Qi', // Quintillion
            ];
        }

        // Loop through each $divisor and find the
        // lowest amount that matches
        foreach ($divisors as $divisor => $shorthand) {
            if (abs($number) < ($divisor * 1000)) {
                // We found a match!
                break;
            }
        }

        // We found our match, or there were no matches.
        // Either way, use the last defined value for $divisor.
        return number_format($number / $divisor, $precision) . $shorthand;
    }
}

if (!function_exists('price_format_with_currency')) {
    /**
     * Formatting time range.
     *
     * @param $price
     * @param $currency
     * @return string
     */
    function price_format_with_currency($price, $currency): string
    {
        return $currency . ' ' . number_format($price, 0, ',', '.');
    }
}
