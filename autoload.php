<?php

function autoload($className)
{
    $classGroup = '';
    $realClassName = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($realClassName, '\\')) {
        $namespace = substr($realClassName, 0, $lastNsPos);
        $realClassName = substr($realClassName, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $realClassName) . '.php';

    if(!preg_match('/CheckoutApi/',$className)) {
        $fileName  = str_replace('PHPPlugin', $classGroup, $fileName);
        include $fileName;
    }

}
spl_autoload_register('autoload');