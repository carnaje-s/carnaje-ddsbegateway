<?php

use Laravel\Lumen\Routing\Router;

$router->get('/', function () use ($router) {
    return $router->app->version();
});

// API GATEWAY ROUTES FOR SITE 1 users
$router->group(['middleware' => 'auth'], function () use ($router) {
$router->get('/users1', 'User1Controller@index');
$router->post('/users1', 'User1Controller@add');
$router->get('/users1/{id}', 'User1Controller@show'); 
$router->put('/users1/{id}', 'User1Controller@update'); 
$router->patch('/users1/{id}', 'User1Controller@update');
$router->delete('/users1/{id}', 'User1Controller@delete');
});
// API GATEWAY ROUTES FOR SITE 2 users
$router->group(['middleware' => 'client.credentials'], function () use ($router) {
$router->get('/users2', 'User2Controller@index');
$router->post('/users2', 'User2Controller@add'); 
$router->get('/users2/{id}', 'User2Controller@show'); 
$router->put('/users2/{id}', 'User2Controller@update');
$router->patch('/users2/{id}', 'User2Controller@update');
$router->delete('/users2/{id}', 'User2Controller@delete');
});
//AUTH routes
$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->get('/user-profile', 'UserController@profile');
});