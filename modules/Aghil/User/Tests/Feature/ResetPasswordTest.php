<?php

namespace Aghil\User\Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ResetPasswordTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_see_reset_password_form()
    {
        $this->get(route('password.request'))->assertOk();
    }

    public function test_user_can_verify_code_form_by_correct_email()
    {
        $this->call('get', route('password.sendVerifyCodeEmail'), ['email' => 'test@test.test'])
            ->assertOk();

    }

    public function test_user_can_not_verify_code_form_by_correct_email()
    {
        $this->call('get', route('password.sendVerifyCodeEmail'), ['email' => 'test.test'])
            ->assertStatus(302);

    }

    public function test_user_ban_after_6_attempt_to_reset_password()
    {
        for ($i = 0; $i < 5; $i++) {
            $this->post(route('password.checkVerifyCode'), ['verifyCode', 'email' => 'test@test.test'])
                ->assertStatus(302);
        }
        $this->post(route('password.checkVerifyCode'), ['verifyCode', 'email' => 'test@test.test'])
            ->assertStatus(429);
    }

}