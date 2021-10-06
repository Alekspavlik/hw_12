<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection(
    [
        'driver'    => 'mysql',
        'host'      => $_ENV['MYSQL_HOST'],
        'database'  => $_ENV['MYSQL_DATABASE'],
        'username'  => $_ENV['MYSQL_USERNAME'],
        'password'  => $_ENV['MYSQL_PASSWORD'],
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ]
);

// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

$capsule->setEventDispatcher(new Dispatcher(new Container));
$capsule->setAsGlobal();
$capsule->bootEloquent();

//\Illuminate\Pagination\Paginator::currentPageResolver(fn() => $_GET['page'] ?? 1);