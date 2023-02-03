<?php

function convertChar($input, $from = "persian", $to = "english")
{
    if ($from == "persian" && $to == "english") {
        $replace = [
            '۱' => '1',
            '۲' => '2',
            '۳' => '3',
            '۴' => '4',
            '۵' => '5',
            '۶' => '6',
            '۷' => '7',
            '۸' => '8',
            '۹' => '9',
            '۰' => '0'
        ];
        $output = str_replace(array_keys($replace), array_values($replace), $input);
    }
    return $output;
}
