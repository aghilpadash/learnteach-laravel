<?php

namespace Aghil\User\Http\Controllers\Auth;

use Aghil\User\Http\Requests\ResetPasswordVerifyCodeRequest;
use Aghil\User\Http\Requests\SendResetPasswordVerifyCodeRequest;
use Aghil\User\Repositories\UserRepo;
use Aghil\User\Services\VerifyCodeService;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    function showVerifyCodeRequestForm()
    {
        return view('User::Front.passwords.email');
    }

    public function sendVerifyCodeEmail(SendResetPasswordVerifyCodeRequest $request)
    {
        $user = resolve(UserRepo::class)->findByEmail($request->email);

        if ($user && !VerifyCodeService::has($user->id)) {
            $user->sendResetPasswordRequestNotification();
        }

        return view('User::Front.passwords.enter-verify-code-form');

    }

    public function checkVerifyCode(ResetPasswordVerifyCodeRequest $request)
    {
        $user = resolve(UserRepo::class)->findByEmail($request->email);
        if ($user == null || !VerifyCodeService::check($user->id, $request->verify_code)) {
            return back()->withErrors(['verify_code' => 'کد وارد شده معتبر نمیباشد !']);
        }
        auth()->loginUsingId($user->id);
        return redirect()->route('password.showResetForm');
    }

}
