<?php

namespace App\Core;

class Route
{
    private $routes;

    public function __construct()
    {
        $this->routes = [];
    }

    public function get(string $url, string $action)
    {
        $this->request($url, 'GET', $action);
    }

    public function post(string $url, string $action)
    {
        $this->request($url, 'POST', $action);
    }

    private function request(string $url, string $method, string $action)
    {
        if (preg_match_all('/({([a-zA-Z]+)})/', $url, $params)) {
            $url = preg_replace('/({([a-zA-Z]+)})/', '(.+)', $url);
        }

        $url = str_replace('/', '\/', $url);

        $route = [
            'url'    => $url,
            'method' => $method,
            'action' => $action,
            'params' => $params[2]
        ];
        array_push($this->routes, $route);
    }

    public function map(string $url, string $method)
    {
        foreach ($this->routes as $route) {
            if ($route['method'] == $method) {
                $reg = '/^' . $route['url'] . '$/';
                if (preg_match($reg, $url, $params)) {
                    array_shift($params);
                    return $this->call_action_route($route['action'], $params);
                }
            }
        }
    
        echo '404 - Not Found';
    }

    private function call_action_route(string $action, array $params)
    {
        if (is_callable($action)) {
            return call_user_func_array($action, $params);
        }

        if (is_string($action)) {
            $action = explode('@', $action);
            $nameSpace = 'App\\Controllers\\';

            if(strpos($action[0], 'Api')){
                $nameSpace = 'App\\Controllers\\Api\\';
            }
            
            $controllerName = $nameSpace . $action[0];
            $controller = new $controllerName();
            return call_user_func_array([$controller, $action[1]], $params);
        }
    }

}