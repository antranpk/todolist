<?php

namespace App\Engine;

require_once __DIR__ . '/Pattern/Singleton.trait.php';

class Loader
{
    use \App\Engine\Pattern\Singleton;
    public function init()
    {
        spl_autoload_register([__CLASS__, '_loadClasses']);
    }

    private function _loadClasses($class)
    {
        $class = str_replace([__NAMESPACE__, 'App', '\\'], '/', $class);

        // var_dump($class);

        if (is_file(__DIR__ . '/' . $class . '.php')) {
            require_once __DIR__ . '/' . $class . '.php';
        }

        if (is_file(ROOT_PATH . $class . '.php')) {
            require_once ROOT_PATH . $class . '.php';
        }
    }
}
