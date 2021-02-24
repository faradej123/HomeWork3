<?php
namespace MikhailovIgor\Lib;

use MikhailovIgor\Lib\Product;

class ExportProduct implements \MikhailovIgor\Interfaces\iExportFormats{
    private function __construct()
    {
        
    }

    public static function makeExportInCSV($productList)
    {
        $csvStr = "Name;Cost;Count\n";
        for($i = 1; $i < count($productList); $i++) {

            $csvStr .= $productList[$i]->getName() . ";" . $productList[$i]->getCost() . ";" . $productList[$i]->getCount() . "\n";
        }
        return $csvStr;
    }

    public static function makeExportInXML($productList)
    {

    }

    public static function makeExportInJSON($productList)
    {

    }
}