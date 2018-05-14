<?php

namespace TestProject\Engine;

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
        $fullPath = ROOT_PATH . $type . '/' . $fileName . '.php';
        if (is_file($fullPath)) {
            require $fullPath;
        } else {
            exit('The "' . $fullPath . '" file doesn\'t exist');
        }
    }

    /**
     * Set variables for the template views.
     *
     * @return void
     */
    public function __set($key, $val)
    {
        $this->$key = $val;
    }
}
