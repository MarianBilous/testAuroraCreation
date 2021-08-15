<?php

namespace System;

use ErrorException;

class Router
{
    static function run()
    {
        $db = new DB();

        $controller = 'ArticleController';
        $action = 'index';
        $model = 'ArticleModel';

        self::parseURL($action, $controller, $model);

        $newController = new $controller(new $model);

        if (!method_exists($newController, $action)) {
            throw new ErrorException('Action does not exist');
        }

        $newController->$action();
    }

    private static function parseURL(string &$action, string &$controller, string &$model)
    {
        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($routes[1])) {
            $controller = ucfirst($routes[1] . 'Controller');
            $model = ucfirst($routes[1] . 'Model');
        }

        if (!empty($routes[2])) {
            $action = $routes[2];
        }

        $controller = 'Controllers\\' . $controller;
        $model = 'Models\\' . $model;

        if (!class_exists($controller)) {
            throw new ErrorException('Controller does not exist');
        }

        if (!class_exists($model)) {
            throw new ErrorException('Model does not exist');
        }
    }
}