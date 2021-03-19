<?php
namespace MikhailovIgor\Controllers;
use MikhailovIgor\Lib\Product;
use MikhailovIgor\Lib\ExportProduct;
use MikhailovIgor\Lib\Logger;
use Exception;

class ExportController extends \Core\Controller{

    private $productList = [];

    public function __construct()
    {
    }

    public function makeExport(String $exportFormat)
    {
        $logger = Logger::getInstance();
        try {
            $this->productList = $this->getProductsFromModel();
            if ($this->productList) {
                $exportFormat = mb_strtoupper($exportFormat);
                $logger->setLogLevelInfo();
                if ($exportFormat == "CSV") {
                    if (ExportProduct::makeExportInCSV($this->productList)) {
                        $logger->createLog("Совершен экспорт в CSV");
                    }
                } else if ($exportFormat == "XML") {
                    if (ExportProduct::makeExportInXML($this->productList)) {
                        $logger->createLog("Совершен экспорт в XML");
                    }
                } else if ($exportFormat == "JSON") {
                    if(ExportProduct::makeExportInJSON($this->productList)) {
                        $logger->createLog("Совершен экспорт в JSON");
                    }
                }
            } else {
                session_start();
                $_SESSION["message"] = "Ошибка при получении данных из репозитория";
                header("Location:" . $_SERVER['HTTP_REFERER']);
                throw new Exception("Ошибка при получении данных из репозитория");
            }
        } catch (\MikhailovIgor\Exception\LoggerException $e) {
            //echo "Исключение логгера: ", $e->getMessage() , "\n";
        } catch (Exception $e) {
            echo "Пользовательское исключение: ", $e->getMessage() , "\n";
            $logger->setLogLevelFatal();
            $logger->createLog($e->getMessage());
        } 
    }

    private function getProductsFromModel(){
        $this->loadModel("product", "Product");
        $productList = $this->product->getAll();
        $arrWithProductObj = [];
        if (is_array($productList) && !empty($productList)) {
            foreach ($productList as $product) {
                $arrWithProductObj[] = new Product($product["name"], $product["cost"], $product["count"]);
            }
        } else {
            return false;
        }
        return $arrWithProductObj;
    }

}