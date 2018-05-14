<?php

namespace TestProject\Engine\Pattern;

trait Singleton
{

    protected static $objInstance = null;

    /**
     * Get instance of class.
     *
     * @access public
     * @static
     * @return object Return the instance class or create first instance of the class.
     */
    public static function getInstance()
    {
        return (null === static::$objInstance) ? static::$objInstance = new static  : static::$objInstance;
    }

}
