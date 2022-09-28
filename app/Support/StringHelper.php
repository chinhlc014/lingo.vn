<?php

namespace App\Support;

use Str;

class StringHelper
{
    public static function makeNameSlug($string)
    {
        $string = preg_replace('/\[[\s\S]+?]/', '', $string);
        $string = trim(mb_strtolower($string));
        $string = preg_replace('/[~!@#$%^\/&*(),._+=?]/', ' ', $string);
        $string = Str::slug($string);
        $string = preg_replace('/-/', ' ', $string);

        return $string;
    }

    /**
     * function description
     *
     * @param $string
     * @return string
     */
    public static function makeNameSlugNumber($string)
    {
        $arrNameSlug = explode(' ', $string);

        $arrHaveNumber = [];
        foreach ($arrNameSlug as $nameSlugPart) {
            if (preg_match('~[0-9]+~', $nameSlugPart)) {
                array_push($arrHaveNumber, $nameSlugPart);
            }
        }

        return implode(' ', $arrHaveNumber);
    }
}
