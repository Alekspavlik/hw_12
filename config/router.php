<?php

use Illuminate\Events\Dispatcher;

$request = \Illuminate\Http\Request::createFromGlobals();
function request() {
    global $request;

    return $request;
}

$dispatcher = new Dispatcher();
$container = new \Illuminate\Container\Container();
$router = new \Illuminate\Routing\Router($dispatcher, $container);

function router() {
    global $router;

    return $router;
}

$router->prefix('categories')->group(function($router){
    $router->get('/', [\Hillel\Controllers\CategoryController::class, 'index']);

    $router->match(['get', 'post'], '/create', [\Hillel\Controllers\CategoryController::class, 'form']);
    $router->match(['get', 'post'], '/update/{id}', [\Hillel\Controllers\CategoryController::class, 'form']);

    $router->get('/delete/{id}', [\Hillel\Controllers\CategoryController::class, 'delete']);
});

$router->prefix('tags')->group(function($router){
    $router->get('/', [\Hillel\Controllers\TagController::class, 'index']);

    $router->match(['get', 'post'], '/create', [\Hillel\Controllers\TagController::class, 'form']);
    $router->match(['get', 'post'], '/update/{id}', [\Hillel\Controllers\TagController::class, 'form']);

    $router->get('/delete/{id}', [\Hillel\Controllers\TagController::class, 'delete']);
});

$router->prefix('posts')->group(function($router){
    $router->get('/', [\Hillel\Controllers\PostController::class, 'index']);

    $router->match(['get', 'post'], '/create', [\Hillel\Controllers\PostController::class, 'form']);
    $router->match(['get', 'post'], '/update/{id}', [\Hillel\Controllers\PostController::class, 'form']);

    $router->get('/delete/{id}', [\Hillel\Controllers\PostController::class, 'delete']);
});

$router->get('/', [\Hillel\Controllers\AdminController::class, 'index']);

// Request -> Application -> Response
// HTTP Request -> Server -> HTTP Response