<?php
function autoload($className)
{

    $baseDir = __DIR__;
    $realClassName = ltrim($className, '\\');
    $realClassName = str_replace('\\',DIRECTORY_SEPARATOR,$realClassName );
    $fileName  = '';
    $includePaths = $baseDir.DIRECTORY_SEPARATOR.$realClassName. '.php';

    if ( $file = stream_resolve_include_path($includePaths) ) {
        if (file_exists($file)) {
            require $file;
        }

    }elseif(preg_match('/^\\\?test/', $className)) {
        $fileName = preg_replace('/^\\\?test\\\/', '', $fileName);
        $fileName = 'test' . DIRECTORY_SEPARATOR  . $fileName;
        include $fileName;

    } else {
        $classNameArray = explode('_', $className);
        $includePath = get_include_path();
        set_include_path($includePath);

        if (!empty($classNameArray) && sizeof($classNameArray) > 1) {

            if (!class_exists('com\checkout\packages\Autoloader')) {
                include 'com'.DIRECTORY_SEPARATOR.'checkout'.DIRECTORY_SEPARATOR.'packages'.DIRECTORY_SEPARATOR.'Autoloader.php';
            }
         }
    }

}
spl_autoload_register('autoload');