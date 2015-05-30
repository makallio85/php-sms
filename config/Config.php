<?php

namespace SMS;

class Config
{
    public static function get()
    {
        return [
            'nexmo' => [
                'key' => 'Your api key here',
                'secret' => 'Your api secret here',
            ]
        ];
    }
}