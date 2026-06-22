<?php

// Start the session — must be called before any output
session_start();

// Load Composer autoloader — makes all vendor classes available (Eloquent, etc.)
require_once __DIR__ . '/vendor/autoload.php';

// Detect the base path so links work in any subdirectory
// e.g. /project/quizz when accessed via localhost/project/quizz
$basePath = dirname($_SERVER['SCRIPT_NAME']);
$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
if (!str_starts_with($requestPath, $basePath)) {
    $basePath = dirname($basePath);
}
define('BASE_URL', rtrim($basePath, '/'));

// Helper: generates a full path from a route
// Usage: url('/leaderboard') → /project/quizz/leaderboard
function url(string $path = '/'): string
{
    return BASE_URL . '/' . ltrim($path, '/');
}

// Bootstrap the database connection
require_once __DIR__ . '/config/database.php';

// Load the Router class
require_once __DIR__ . '/router.php';

// Create the router instance
$router = new Router();

// Register all application routes
require_once __DIR__ . '/routes.php';

// Dispatch the current request to the correct controller method
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
