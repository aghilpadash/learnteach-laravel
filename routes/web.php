<?php

use Aghil\User\Mail\VerifyCodeMail;
use Aghil\User\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});

