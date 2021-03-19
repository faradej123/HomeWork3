<?php
namespace MikhailovIgor\Lib;

use MikhailovIgor\Exception\LoggerException;

class Logger
{
    private static $pathToLogFile = \Core\Configs\Consts::DOCUMENT_ROOT ."log.txt";
    private static $classLoader = NULL;
    private static $logLevel;

    private function __construct(){
    }

    public static function getInstance()
    {
        
        if (self::$classLoader === null) {
            self::$classLoader = new self();
        }

        return self::$classLoader;
    }

    public function setPathToLogFile(String $pathToLogFile)
    {
        if (verifyPathToLogFile($pathToLogFile)) {
            throw new LoggerException("Ошибка при отрытии файла логирования! Возможно указан неверный путь к файлу");
        } else {
            self::$pathToLogFile = $pathToLogFile;
        }
    }

    function verifyPathToLogFile($pathToLogFile)
    {
        $file = fopen($pathToLogFile, "a+");
        if ($file) {
            fclose($file);
            return true;
        } else {
            return false;
        }
    }

    public function createLog(String $textLog)
    {
        $timeNow = date("d-m-Y H:m:s");
        $file = fopen(self::$pathToLogFile, "a+");
        if (!$file) {
            throw new LoggerException ("Ошибка при открытии файла");
        }
        $strToLog = (self::$logLevel ? (self::$logLevel . " >>> ") : "") . $timeNow . " >>> " . $textLog . "\n";
        $test = fwrite($file, $strToLog);
        fclose($file);
    }

    public function setLogLevelFatal()
    {
        self::$logLevel = "FATAL";
    }

    public function setLogLevelInfo()
    {
        self::$logLevel = "INFO";
    }

    public function setLogLevelWarning()
    {
        self::$logLevel = "WARNING";
    }
}
