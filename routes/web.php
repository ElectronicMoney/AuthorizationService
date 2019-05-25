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

$router->group(['prefix' => 'v1', 'middleware' => 'auth'], function () use ($router) {
    $router->post('/admins', 'AdminController@store');
    $router->get('/admins', 'AdminController@index');
    $router->get('/admins/{admin}', 'AdminController@show');
    $router->put('/admins/{admin}', 'AdminController@update');
    $router->patch('/admins/{admin}', 'AdminController@update');
    $router->delete('/admins/{admin}', 'AdminController@destroy');
});




