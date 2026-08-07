<?php

declare(strict_types=1);

spl_autoload_register(function (string $className): void {
    $path = str_replace('\\', '/', $className);

    $filePath = __DIR__ . '/../' . $path . '.php';

    if (is_file($filePath)) {
        require_once $filePath;
    }
});

use Core\Application;
use Core\Router;

$routes = require __DIR__ . '/../routes/web.php';

$router = new Router($routes);

$app = new Application($router);

$app->run();