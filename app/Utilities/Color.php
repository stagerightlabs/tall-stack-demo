<?php

namespace App\Utilities;

class Color
{
    /**
     * The secret sauce. Generate a random color.
     *
     * Borrowed from https://convertingcolors.com/blog/article/how_to_get_random_colors.html
     *
     * @return void
     */
    public static function random()
    {
        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }
}
