<?php

use Aghil\User\Mail\VerifyCodeMail;
use Aghil\User\Models\User;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;


Route::get('/', function () {
    return view('index');
});

Route::get('/test', function () {
    Permission::Create(['name' => 'manage role_permissions']);
    auth()->user()->givePermissionTo('manage role_permissions');
    return auth()->user()->permissions;
});

