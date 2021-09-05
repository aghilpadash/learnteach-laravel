<?php
/**
 * Created and Developed by Aghil Padash
 **/
Route::group(['namespace' => 'Aghil\Dashboard\Http\Controllers'], routes: function ($router) {
    $router->get('/home', 'DashboardController@home')->name('home');
});