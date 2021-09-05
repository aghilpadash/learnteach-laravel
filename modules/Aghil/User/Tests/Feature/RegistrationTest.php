<?php

namespace Aghil\User\Tests\Feature;

use Aghil\User\Models\User;
use Aghil\User\Services\VerifyCodeService;
use Aghil\User\Tests\Unit\VerifyCodeServiceTest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_user_can_see_register_form()
    {
        $response = $this->get(route('register'));

        $response->assertStatus(200);
    }

    public function test_user_can_register()
    {
        $this->withoutExceptionHandling();

        $response = $this->post(route('register'), [
            'name' => 'alis test',
            'email' => 'test@test1.com',
            'mobile' => '09166023212',
            'password' => 'z$&D9*3vjV58',
            'password_confirmation' => 'z$&D9*3vjV58'

        ]);

        $response->assertRedirect(route('home'));

        $this->assertCount(1, User::all());
    }

    public function test_user_have_to_verify_account()
    {
        $this->post(route('register'), [
            'name' => 'ali',
            'email' => 'test@gmail.com',
            'mobile' => '09166023212',
            'password' => 'z$&D9*3vjV58',
            'password_confirmation' => 'z$&D9*3vjV58'

        ]);
        $response = $this->get(route('home'));
        $response->assertRedirect(route('verification.notice'));
    }

    public function test_user_can_verify_account()
    {
        $user = User::create(
            [
                'name' => 'alis test',
                'email' => 'test@test1.com',
                'mobile' => '09166023212',
                'password' => bcrypt('z$&D9*3vjV58'),
            ]);
        $code = VerifyCodeService::generate();
        VerifyCodeService::store($user->id, $code, now()->addMinutes(30));
        auth()->loginUsingId($user->id);

        $this->assertAuthenticated();
        $this->post(route('verification.verify'), [
            'verify_code' => $code]);
        $this->assertEquals(true, $user->fresh()->hasVerifiedEmail());
    }

    public function test_verified_user_can_see_home_page()
    {
        $this->post(route('register'), [
            'name' => 'ali do',
            'email' => 'test@test1.com',
            'mobile' => '09166023212',
            'password' => 'z$&D9*3vjV58',
            'password_confirmation' => 'z$&D9*3vjV58'

        ]);

        $this->assertAuthenticated();
        auth()->user()->markEmailAsVerified();
        $response = $this->get(route('home'));
        $response->assertOk();
    }

}