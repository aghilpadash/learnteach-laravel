<?php
/**
 * Created and Developed by Aghil Padash
 **/


Route::group(["namespace" => "Aghil\RolePermissions\Http\Controllers", 'middleware' => ['web', 'auth', 'verified']], function ($router) {
    $router->resource('role-permissions', 'RolePermissionsController')->middleware('permission:manage role_permissions');
});
