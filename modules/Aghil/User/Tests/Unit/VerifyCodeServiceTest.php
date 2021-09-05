<?php
/**
 * Created and Developed by Aghil Padash
 **/

namespace Aghil\User\Tests\Unit;


use Aghil\User\Services\VerifyCodeService;
use Tests\TestCase;

class VerifyCodeServiceTest extends TestCase
{
    public function test_generated_code_is_6_digit()
    {
        $code = VerifyCodeService::generate();
        $this->assertIsNumeric($code, "کد معتبر نیست");
        $this->assertLessThanOrEqual(999999, $code, "کد کمتر از 999999 است");
        $this->assertGreaterThanOrEqual(100000, $code, "کد بزرگتر از 999999 است");
    }

    public function test_verify_code_can_store()
    {
        $code = VerifyCodeService::generate();
        VerifyCodeService::store(1, $code, now()->addMinutes(30));

        $this->assertEquals($code, cache()->get('verify_code_1'));
    }
}