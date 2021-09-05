<?php

namespace Aghil\User\Tests\Unit;

use Aghil\User\Rules\ValidPassword;
use PHPUnit\Framework\TestCase;

class PasswordValidationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_password_not_less_than_6()
    {
        $result = (new ValidPassword())->passes('', 'z$&D9');
        $this->assertEquals(0, $result);
    }

    public function test_password_include_sign_character()
    {
        $result = (new ValidPassword())->passes('', 'z119D9');
        $this->assertEquals(0, $result);
    }

    public function test_password_include_digit_character()
    {
        $result = (new ValidPassword())->passes('', 'z$&Der*');
        $this->assertEquals(0, $result);
    }

    public function test_password_include_capital_character()
    {
        $result = (new ValidPassword())->passes('', 'z$&8er*');
        $this->assertEquals(0, $result);
    }

    public function test_password_include_small_character()
    {
        $result = (new ValidPassword())->passes('', 'Z$&8ER*');
        $this->assertEquals(0, $result);
    }
}
