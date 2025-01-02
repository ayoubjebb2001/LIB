<?php

class Router {
    private $routes = [];

    public function add($method, $path, $controller, $action) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
            'action' => $action
        ];
    }

    public function dispatch() {
        $method = $_SERVER['REQUEST_METHOD'];
        $path = $_SERVER['REQUEST_URI'];
        // Remove base path from URL
        $path = parse_url($path, PHP_URL_PATH);

        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['path'] === $path) {
                $controller = new $route['controller']();
                call_user_func([$controller, $route['action']]);
                return;
            }
        }
        
        // 404 handling
        header("HTTP/1.0 404 Not Found");
        echo "404 Not Found";
    }
}