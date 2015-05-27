<?php

function autoload($className)
{
    $classGroup = '';
    $realClassName = ltrim($className, '\\');
    $fileName  = '';
    $namespace = 'com\checkout';
    if ($lastNsPos = strrpos($realClassName, '\\')) {
        $namespace = substr($realClassName, 0, $lastNsPos);
        $realClassName = substr($realClassName, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $realClassName) . '.php';

    if(!preg_match('/CheckoutApi/',$className)) {

        $fileName = preg_replace('/^\\\/','',$fileName);

        $fileName = preg_replace('/^\\\?com\\\checkout/','',$fileName);
        $fileName  = 'com'. DIRECTORY_SEPARATOR.'checkout'.$fileName;

        include $fileName;
    }else {
        $classNameArray = explode('_',$className);
        $includePath = get_include_path();
        set_include_path($includePath);
        $path = '';
        
        if(!empty($classNameArray) && sizeof($classNameArray)>1 ) {

       
          if (!class_exists('com\checkout\packages\Autoloader')) {
              include 'com/checkout/packages/Autoloader.php';
          }
            
          
        }
    }

}
spl_autoload_register('autoload');