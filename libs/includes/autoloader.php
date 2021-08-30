<?php

class Autoloader {

  private static $logPath = SOURCE_PATH . "logs/autoloader_mkx";

  public static function autoLoad ($class) {
    if (substr($class, 0, 3) !== 'mkx') {
        return false;
    }
   
    $class = str_replace("mkx\\", "", $class);
    
    $classPath = str_replace("\\", DIRECTORY_SEPARATOR, $class) . ".php";

    $fullFilePath = self::getClassFilePath($classPath);
    if ($fullFilePath !== false) {
        require $fullFilePath;
    }
  }

  public static function getClassFilePath ($file) {
      if (file_exists("class/".$file)) return "class/".$file;
      if (file_exists(LIBS_PATH.$file)) return LIBS_PATH.$file;
      return false;
  }

  public static function saveAutoloaderLog ($message, $type = "") {
      $msg = "[".__CLASS__."]\n";
      $msg .= $message . " -- " . date("H:m:s");
      $msg .= "\n\n";
      if (!is_dir(self::$logPath)) mkdir(self::$logPath);
      error_log($msg, 3, self::$logPath . "/" .$type. date("Y-m-d") . ".txt");
  }

  public static function register () {
      try {
          spl_autoload_register("self::autoLoad", true);
      } catch (\Exception $ex) {
          self::saveAutoloaderLog($ex->getMessage(), "excepetion");
      }
  }

  public static function setLogPath($path) {
    self::$logPath = $path;
  }

}

?>