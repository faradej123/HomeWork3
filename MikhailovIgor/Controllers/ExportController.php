<?php
namespace MikhailovIgor\Controllers;
use MikhailovIgor\Lib\Product;
use MikhailovIgor\Lib\ExportProduct;


class ExportController extends \Core\Controller{

    private $productList = [];

    public function __construct()
    {
    }


    public function makeExport(String $exportFormat)
    {
        $this->loadModel("product", "Product");
        $productList = $this->product->getAll();
        if (is_array($productList) && !empty($productList)) {
            foreach ($productList as $product) {
                $this->productList[] = new Product($product["name"], $product["cost"], $product["count"]);
            }
        }
        $exportFormat = mb_strtoupper($exportFormat);
        if ($exportFormat == "CSV") {
            $exportedStr = ExportProduct::makeExportInCSV($this->productList);
        } else if ($exportFormat == "XML") {
            $exportedStr = ExportProduct::makeExportInXML($this->productList);
        } else if ($exportFormat == "JSON") {
            $exportedStr = ExportProduct::makeExportInJSON($this->productList);
        }
        if ($exportedStr) {
            $temporaryFile = tmpfile();
            fwrite($temporaryFile, $exportedStr);
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=Product' . $exportFormat);
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . filesize($temporaryFile));
            readfile($temporaryFile);
            fclose($temporaryFile);
        }
        //var_dump($this->productList);

    }

    public function getProducts(){

    }
}