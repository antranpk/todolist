<?php

namespace App;

use App\Engine as E;
error_reporting(E_ALL);

if (!extension_loaded('mbstring')) {
    exit('The script requires "mbstring" PHP extension. Please install it.');
}

define('PROT', (!empty($_SERVER['HTTPS']) && strtolower('on' == $_SERVER['HTTPS'])) ? 'https://' : 'http://');
define('ROOT_URL', PROT . $_SERVER['HTTP_HOST'] . str_replace('\\', '', dirname(htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES))) . '/');

require_once 'config.php';

require_once ROOT_PATH . 'helper/helper.php';

try
{
    require ROOT_PATH . 'Engine/Loader.php';
    E\Loader::getInstance()->init();
    $params = ['controller' => (!empty($_GET['p']) ? $_GET['p'] : 'taskController'), 'action' => (!empty($_GET['a']) ? $_GET['a'] : 'index')];
    E\Router::run($params);
} catch (\Exception $oE) {
    echo $oE->getMessage();
}
