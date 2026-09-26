<?php

$routes->group('', ['namespace' => 'App\Modules\Auth\Controllers'], function ($routes) {
    $routes->get('login', 'Auth::login');
    $routes->post('login', 'Auth::attempt');
    $routes->get('logout', 'Auth::logout');
    $routes->get('register', 'Auth::register');
    $routes->post('register', 'Auth::store');
});
