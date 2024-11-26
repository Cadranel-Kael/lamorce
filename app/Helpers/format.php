<?php

if (! function_exists('format_currency')) {
    function format_currency(int $value)
    {
        return number_format(($value * 0.01), 2, '.', ' ');
    }
}
