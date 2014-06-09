<?php

define('BASE_PATH', realpath(dirname(__FILE__)));

function __autoload($className) {
	$temp = str_replace('\\', '/', $className);
    $temp = BASE_PATH . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . $temp . '.php';
    if (file_exists($temp)) {
        require_once $temp;
        return true;
    }
    return false;
}
