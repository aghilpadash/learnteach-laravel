<?php

namespace Aghil\User\Tests\Unit;

use Aghil\User\Rules\ValidMobile;
use PHPUnit\Framework\TestCase;

class MobileValidationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_mobile_less_11_character()
    {
        $result = (new ValidMobile())->passes('', '0912345678');
        $this->assertEquals(0, $result);
    }

    public function test_mobile_more_11_character()
    {
        $result = (new ValidMobile())->passes('', '091234567890');
        $this->assertEquals(0, $result);
    }

    public function test_mobile_start_by_09()
    {
        $result = (new ValidMobile())->passes('', '12345678978');
        $this->assertEquals(0, $result);
    }
}

