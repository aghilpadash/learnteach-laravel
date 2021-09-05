<?php

namespace Aghil\User\Repositories;

use Aghil\User\Models\User;

/**
 * Created and Developed by Aghil Padash
 **/
class UserRepo
{
    public function findByEmail($email)
    {
        return User::query()->where('email', $email)->first();
    }
}