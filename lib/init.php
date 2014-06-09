<?php

define('BASE_PATH', realpath(dirname(__FILE__)));

function autoloadClasses($className) {
	$temp = str_replace('\\', '/', $className);
    $temp = BASE_PATH . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . $temp . '.php';
    file_put_contents('/home/media/Downloads/bj.txt', $temp);
    if (file_exists($temp)) {
        require_once $temp;
        return true;
    }
    return false;
}

spl_autoload_register('autoloadClasses');