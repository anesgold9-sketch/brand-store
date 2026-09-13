<?php
namespace App\Core;

class Router {
    private array $routes = [];

    // تسجيل مسارات GET
    public function get(string $path, string $handler): void {
        $this->routes['GET'][$path] = $handler;
    }

    // تسجيل مسارات POST
    public function post(string $path, string $handler): void {
        $this->routes['POST'][$path] = $handler;
    }

    // توجيه الطلبات
    public function dispatch(string $uri, string $method): void {
        // إزالة المتغيرات المرفقة بالرابط إن وجدت
        $uri = explode('?', $uri)[0];

        if (isset($this->routes[$method][$uri])) {
            $handler = $this->routes[$method][$uri];
            list($controllerName, $action) = explode('@', $handler);

            $controllerClass = "App\\Controllers\\" . $controllerName;
            $controllerFile = __DIR__ . "/../Controllers/" . $controllerName . ".php";

            if (file_exists($controllerFile)) {
                require_once $controllerFile;
            }

            if (class_exists($controllerClass)) {
                $controller = new $controllerClass();
                if (method_exists($controller, $action)) {
                    $controller->$action();
                    return;
                }
            }
        }

        // في حال عدم وجود المسار
        http_response_code(404);
        echo "404 - الصفحة غير موجودة: " . htmlspecialchars($uri);
    }
}