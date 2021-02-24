<?php
namespace MikhailovIgor\Models;

class Product{
    public function getAll()
    {
        $data = [];
        $columnName = [];
        if (($csvFile = fopen("MikhailovIgor\Models\products.csv", "r")) !== FALSE) {
            if (($row = fgetcsv($csvFile, 0, ";")) !== FALSE) {
                $columnName = $row;
            }
            while (($row = fgetcsv($csvFile, 0, ";")) !== FALSE) {
                $rowInData = [];
                for ($i = 0; $i < count($row); $i++) {
                    $rowInData[$columnName[$i]] = $row[$i];
                }
                $data[] = $rowInData;
            }
            fclose($csvFile);
        }
        return $data;
    }
}