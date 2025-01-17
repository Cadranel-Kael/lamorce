<?php

if (! function_exists('format_currency')) {
    function format_currency(int $value): string
    {
        return number_format(($value * 0.01), 2, '.', ' ');
    }
}

if (! function_exists('truncate')) {
    function truncate(string $value, int $length = 100, string $append = '&hellip;'): string
    {
        $value = trim($value);

        if(strlen($value) > $length) {
            $value = wordwrap($value, $length);
            $value = explode("\n", $value, 2);
            $value = $value[0] . $append;
        }

        return $value;
    }
}

if (! function_exists('get_initials')) {
    function get_initials(string $value, int | null $limit = null): string
    {
        $words = explode(' ', $value);
        $initials = '';
        $limit = $limit ?? count($words);

        for ($i = 0; $i < $limit; $i++) {
            $initials .= $words[$i][0];
        }

        return strtoupper($initials);
    }
}
