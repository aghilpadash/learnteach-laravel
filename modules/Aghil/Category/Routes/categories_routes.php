<?php

Route::group(["namespace" => "Aghil\Category\Http\Controllers", 'middleware' => ['web', 'auth', 'verified']], function ($router) {
    $router->resource('categories', 'CategoryController');
});
