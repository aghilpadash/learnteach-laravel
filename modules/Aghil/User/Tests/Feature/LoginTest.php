<?php

namespace Aghil\User\Tests\Feature;

use Aghil\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_login_by_email()
    {
        $user = User::create(
            [
                'name' => $this->faker->name,
                'email' => $this->faker->safeEmail,
                'mobile' => '09123456789',
                'password' => bcrypt('z$&D9*3vjV58'),
            ]);
        $this->post(route('login'), [
            'email' => $user->email,
            'password' => 'z$&D9*3vjV58'
        ]);

        $this->assertAuthenticated();
    }
}