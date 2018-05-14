<?php

namespace TestProject\Engine;

require_once __DIR__ . '/Pattern/Singleton.trait.php';

class Loader
{
    use \TestProject\Engine\Pattern\Singleton;
    public function init()
    {
        // Register the loader method
        spl_autoload_register([__CLASS__, '_loadClasses']);
    }

    private function _loadClasses($class)
    {
        // Remove namespace and backslash
        $class = str_replace([__NAMESPACE__, 'TestProject', '\\'], '/', $class);

        if (is_file(__DIR__ . '/' . $class . '.php')) {
            require_once __DIR__ . '/' . $class . '.php';
        }

        if (is_file(ROOT_PATH . $class . '.php')) {
            require_once ROOT_PATH . $class . '.php';
        }
    }
}
