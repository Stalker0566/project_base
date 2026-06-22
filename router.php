<?php

class Router
{
    private array $routes = [];

    public function get(string $uri, string $action): void
    {
        $this->routes[] = ['method' => 'GET', 'uri' => $uri, 'action' => $action];
    }

    public function post(string $uri, string $action): void
    {
        $this->routes[] = ['method' => 'POST', 'uri' => $uri, 'action' => $action];
    }

    public function dispatch(string $requestUri, string $requestMethod): void
    {
        $uri = parse_url($requestUri, PHP_URL_PATH);

        // Strip the base path so routes work when the project lives in a subdirectory
        // e.g. localhost/project/quizz/quiz → /quiz
        $uri = substr($uri, strlen(BASE_URL)) ?: '/';

        $uri = rtrim($uri, '/') ?: '/';

        foreach ($this->routes as $route) {
            if ($route['method'] !== strtoupper($requestMethod)) {
                continue;
            }

            $pattern = $this->uriToPattern($route['uri']);

            if (preg_match($pattern, $uri, $matches)) {
                array_shift($matches); // remove the full match, keep only capture groups
                $this->callAction($route['action'], $matches);
                return;
            }
        }

        http_response_code(404);
        echo '<h1>404 — Page not found</h1>';
    }

    private function uriToPattern(string $uri): string
    {
        // Convert {param} placeholders into regex capture groups
        $escaped = preg_quote($uri, '#');
        $pattern = preg_replace('/\\\\\{[a-zA-Z_]+\\\\\}/', '([^/]+)', $escaped);
        return '#^' . $pattern . '$#';
    }

    private function callAction(string $action, array $params = []): void
    {
        [$controllerName, $method] = explode('@', $action);

        require_once __DIR__ . '/Controllers/' . $controllerName . '.php';

        $controller = new $controllerName();
        call_user_func_array([$controller, $method], $params);
    }
}
