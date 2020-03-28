<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!function_exists('getallheaders'))  {
    function getallheaders()
    {
        if (!is_array($_SERVER)) {
            return array();
        }

        $headers = array();
        foreach ($_SERVER as $name => $value) {
            if (substr($name, 0, 5) == 'HTTP_') {
                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
            }
        }
        return $headers;
    }
}

$serverRoot = dirname(__DIR__);
require_once($serverRoot . '/autoload.php');
require_once($serverRoot . '/vendor/Magnus/autoload.php');

$rootObject = new \Home\HomeController();
$app = new \Magnus\Core\Application($rootObject);

$app->run();
