<?php
namespace MikhailovIgor\Lib;

use Exception;

class Logger
{
    private static $pathToLogFile;
    private static $classLoader = NULL;
    private static $logLevelsList = ["TRACE", "DEBUG", "INFO", "WARN", "ERROR", "FATAL"];
    private static $defaulLogLevel = "INFO";

    private function __construct(/*String $pathToLogFile*/){
        $this->pathToLogFile = $pathToLogFile;
    }

    public static function getInstance(String $pathToLogFile)
    {
        if (!self::verifyPathToLogFile($pathToLogFile)) {
            throw new Exception("Ошибка при отрытии файла логирования! Возможно указан неверный путь к файлу");
        }
        if (self::$classLoader === null) {
            self::$classLoader = new self();
            self::$pathToLogFile = $pathToLogFile;
        }

        return self::$classLoader;
    }

    private static function verifyPathToLogFile($pathToLogFile)
    {
        $file = fopen($pathToLogFile, "a+");
        if ($file) {
            fclose($file);
            return true;
        } else {
            return false;
        }
    }

    public static function createLog(String $textLog, String $logLevel = "INFO")
    {
        $timeNow = date("d-m-Y H:m:s");
        $file = fopen(self::$pathToLogFile, "a+");
        $actualLoglevel = self::$defaulLogLevel;
        foreach (self::$logLevelsList as $logLevelFromList) {
            if ($logLevelFromList == $logLevel) {
                $actualLoglevel = $logLevel;
                break;
            }
        }
        fwrite($file, $actualLoglevel . " >>> " . $timeNow . " >>> " . $textLog . "\n");
        fclose($file);
    }
}
