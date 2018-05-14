<?php

namespace TestProject\Engine;

class Router
{
    public static function run(array $params)
    {
        $namespace = 'TestProject\Controller\\';
        $defaultController = $namespace . 'TaskController';
        $controllerPath = ROOT_PATH . 'Controller/';
        $controller = ucfirst($params['controller']);

        if (is_file($controllerPath . $controller . '.php')) {
            $controller = $namespace . $controller;

            $objUntil = new \TestProject\Engine\Util;
            $objController = new $controller();

            if ((new \ReflectionClass($objController))->hasMethod($params['action']) && (new \ReflectionMethod($objController, $params['action']))->isPublic()) {
                call_user_func([$objController, $params['action']]);
            } else {
                call_user_func([$objController, 'notFound']);
            }
        } else {
            call_user_func([new $defaultController, 'notFound']);
        }
    }
}
