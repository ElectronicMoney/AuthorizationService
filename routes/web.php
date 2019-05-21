<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->group(['prefix' => 'v1/auth'], function () use ($router) {
    $router->post('/login', 'Auth\AuthController@login');
    $router->post('/register', 'Auth\AuthController@register');
});

$router->group(['prefix' => 'v1', 'middleware' => 'auth'], function () use ($router) {
    $router->get('/users', 'UserController@index');
    $router->get('/users/{user}', 'UserController@show');
    $router->put('/users/{user}', 'UserController@update');
    $router->patch('/users/{user}', 'UserController@update');
    $router->delete('/users/{user}', 'UserController@destroy');
});




