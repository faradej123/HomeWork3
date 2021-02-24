<?php
namespace MikhailovIgor\Controllers;
use Core\Configs\Consts;

class HomePageController extends \Core\Controller{
    public function __construct()
    {
    }

    public function showUrls(){

        //$this->loadModel("user", "User");

        //$users = $this->user->getAll();

        $this->data("exportToXml", "http://" . $_SERVER['HTTP_HOST'] . "/export/xml/");
        $this->data("exportToJson", "http://" . $_SERVER['HTTP_HOST'] . "/export/json/");
        $this->data("exportToCsv", "http://" . $_SERVER['HTTP_HOST'] . "/export/csv/");
        $this->data("template", Consts::DOCUMENT_ROOT . "\\MikhailovIgor\\Views\\HomePage.php");
        $this->display(Consts::DOCUMENT_ROOT . "MikhailovIgor\\Views\\index.php");
    }

}