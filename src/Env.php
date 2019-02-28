<?php

namespace Mesavolt;


class Env
{
    public static function has(string $var): bool
    {
        return array_key_exists($var, $_ENV) || getenv($var) !== false;
    }

    public static function get(string $var)
    {
        if (!self::has($var)) {
            throw new \RuntimeException("Env var $var is not defined");
        }

        $value = $_ENV[$var] ?? getenv($var);

        if ($value === '') {
            throw new \RuntimeException("Env var $var is empty");
        }

        return $value;
    }

    public static function getSafe(string $var)
    {
        if (!self::has($var)) {
            throw new \RuntimeException("Env var $var is not defined");
        }

        return $_ENV[$var] ?? getenv($var);
    }
}
