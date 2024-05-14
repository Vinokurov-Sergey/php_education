<?php
namespace Base;
class Route
{
    private $controller;
    private $action;
    private $routes;

    public function addRoute($route, $controllerName, $actionName='index')
    {
    $this->routes[$route] = [$controllerName, $actionName];
    }

    public function dispatch($uri)
    {
        $parts = parse_url($uri);
        $path = $parts['path'];
        if (isset($this->routes[$path]))
        {
            $this->controller = new $this->routes[$path][0];
            $this->action = $this->routes[$path][1];
            return;
        }
        if(!$this->auto($path))
        {
            throw new \Exception();
        }
    }

    public function auto($uri)
    {
        $parts = explode('/', $uri);
        if(empty($parts[1]))
        {
            return false;
        }
        $controllerName = $parts[1];
        $actionName = 'index';
        if(isset($parts[2]))
        {
            $actionName = $parts[2];
        }
        $controllerClassName = 'App\\Controller\\' . ucfirst(strtolower($controllerName));
        if(!class_exists($controllerClassName))
        {
            return false;
        }
        $this->controller = new $controllerClassName();
        if(!method_exists($this->controller, $actionName))
        {
            return false;
        }
        $this->action = $actionName;
        return true;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function getAction()
    {
        return $this->action;
    }
}