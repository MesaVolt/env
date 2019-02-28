<?php

namespace Mesavolt\Tests;


use Mesavolt\Env;
use PHPUnit\Framework\TestCase;

class EnvTest extends TestCase
{

    public function testGetSafe()
    {
        putenv('ENV_VAR_1=');
        $value = Env::getSafe('ENV_VAR_1');

        $this->assertEmpty($value);
    }

    public function testHas()
    {
        putenv('ENV_VAR_2=test');
        $_ENV['ENV_VAR_3'] = 'test';

        $this->assertTrue(Env::has('ENV_VAR_2'));
        $this->assertTrue(Env::has('ENV_VAR_3'));

        $this->assertFalse(Env::has('UNDEFINED_ENV_VAR'));
    }

    public function testGet()
    {
        putenv('ENV_VAR_4=test4');
        $_ENV['ENV_VAR_5'] = 'test5';

        $this->assertEquals('test4', Env::get('ENV_VAR_4'));
        $this->assertEquals('test5', Env::get('ENV_VAR_5'));

        $this->expectException(\RuntimeException::class);
        $this->expectExceptionMessage("Env var UNDEFINED_ENV_VAR is not defined");
        Env::get('UNDEFINED_ENV_VAR');
    }
}
