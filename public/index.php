<?php

require_once '../vendor/autoload.php';
require_once '../config/dotenv.php';
require_once '../config/blade.php';
require_once '../config/router.php';
require_once '../config/eloquent.php';

$response = $router->dispatch($request);
echo $response->getContent();