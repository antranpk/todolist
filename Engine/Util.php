<?php

namespace App\Engine;

class Util
{
    public function getView($viewName)
    {
        $this->_get($viewName, 'View');
    }

    public function getModel($modelName)
    {
        $this->_get($modelName, 'Model');
    }

    private function _get($fileName, $type)
    {
        $fullPath = '/var/www/html/todolist/' . $type . '/' . $fileName . '.php';
        if (is_file($fullPath)) {
            require $fullPath;
        } else {
            exit('The "' . $fullPath . '" file doesn\'t exist');
        }
    }

    public function __set($key, $val)
    {
        $this->$key = $val;
    }
}
