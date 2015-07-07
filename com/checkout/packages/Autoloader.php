<?php
namespace com\checkout\packages;
class Autoloader {
  
  private static $_instance;
  
  public static function instance()
  {
      if (!self::$_instance) {
          $class = __CLASS__;
          self::$_instance = new $class();
      }
      return self::$_instance;
  }

  function autoload($class)
  {
      $realClassName = ltrim($class, '\\');
      $classNameArray = explode('_',$realClassName);
      $includePath = get_include_path();
      set_include_path($includePath);
      $path = '';
      $baseDir = __DIR__;
      if(!preg_match('/PHPUnit/',$realClassName) &&  !preg_match('/Composer/',$realClassName)) {
          if (!empty($classNameArray) && sizeof($classNameArray) > 1) {

              $path = $baseDir.DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $classNameArray) . '.php';
              $path = str_replace('\PHPPlugin\\', '', $path);
              $path = str_replace('\\',DIRECTORY_SEPARATOR,$path );

              if ( $file = stream_resolve_include_path($path) ) {
                  if (file_exists($file)) {
                      require $file;
                  }
              }

          }
      }

  }

  public static function register() 
  { 
    spl_autoload_extensions('.php');
    spl_autoload_register(array(self::instance(), 'autoload'));
  }

}


$autoload = new Autoloader();
Autoloader::register();
