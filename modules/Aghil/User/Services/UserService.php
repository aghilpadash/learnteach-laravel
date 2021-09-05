<?php
/**
 * Created and Developed by Aghil Padash
 **/

namespace Aghil\User\Services;

class UserService
{
    public static function changePassword($user, $newPassword)
    {
        $user->password = bcrypt($newPassword);
        $user->save();
    }
}