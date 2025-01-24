<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['prefix' => 'premios'], function () use ($router) {
    $router->get('/',         ['uses' => 'PremiosController@index']);
    $router->get('/{id}',     ['uses' => 'PremiosController@show']);
    $router->post('/',        ['uses' => 'PremiosController@store']);
    $router->put('/{id}',     ['uses' => 'PremiosController@update']);
    $router->delete('/{id}',  ['uses' => 'PremiosController@destroy']);
});