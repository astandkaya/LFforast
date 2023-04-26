<?php

require __DIR__.'/../vendor/autoload.php';

Dotenv\Dotenv::createImmutable(__DIR__.'/../')->safeLoad();

ini_set('display_errors', $_ENV['DISPLAY_ERRORS'] ?? 1);

$dispatcher = FastRoute\simpleDispatcher(function($r) {
    $r->addRoute('GET', '/', new Controller\TopController());
},[
    'cacheFile' => __DIR__ . '/route.cache',
    'cacheDisabled' => true
]);

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$uri = rawurldecode(explode('?', $uri)[0]);

[$status, $handler, $vars] = array_pad($dispatcher->dispatch($method, $uri), 3, null);

echo match ($status) {
    FastRoute\Dispatcher::FOUND => $handler($vars),
    FastRoute\Dispatcher::NOT_FOUND => "404 Not Found\n",
    FastRoute\Dispatcher::METHOD_NOT_ALLOWED => "405 Method Not Allowed\n",
	default => "Unknown error\n",
};
