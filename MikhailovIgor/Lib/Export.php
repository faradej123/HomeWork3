<?php
namespace MikhailovIgor\Lib;
use MikhailovIgor\Lib\Logger;
use Exception;

class Export {

    private function __construct()
    {
        
    }

    protected static function sendFileToDownload(String $fileName, String $strToFile)
    {
        $filePath = tempnam(sys_get_temp_dir(), 'tmp');
        if (!$filePath) {
            throw new Exception("Ошибка при создании временного файла");
        }
        $file = fopen($filePath, "w+");
        if (!$file) {
            throw new Exception("Ошибка при открытии временного файла");
        }
        $fileSize = fwrite($file, $strToFile);
        fclose($file);
        if ($fileSize === FALSE) {
            throw new Exception("Ошибка при записи в временный файл");
        }
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream; charset=utf-8');
        header('Content-Disposition: attachment; filename=' . $fileName);
        header('Content-Transfer-Encoding: binary');
        header('Content-Length: ' . $fileSize);
        if (!readfile($filePath)) {
            throw new Exception("Ошибка при чтении из временного файла");
        }
        unlink($filePath);
        return true;
    }
}