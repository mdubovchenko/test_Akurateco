<?php

class Config
{
    private static string $key = '5b6492f0-f8f5-11ea-976a-0242c0a85007';
    private static string $pass = 'd0ec0beca8a3c30652746925d5380cf3';
    private static string $url = 'https://dev-api.rafinita.com/post';

    public static function getKey(): string
    {
        return self::$key;
    }

    public static function getPass(): string
    {
        return self::$pass;
    }

    public static function getUrl(): string
    {
        return self::$url;
    }
}