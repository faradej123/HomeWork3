<?php
namespace MikhailovIgor\Controllers;
use Core\Configs\Consts;

class HomePageController extends \Core\Controller{
    public function __construct()
    {
    }

    public function showUrls(){
        session_start();
        if($_SESSION["message"]) {
            $this->data("message", $_SESSION["message"]);
            session_unset();
        }
        $this->data("exportToXml", "https://" . $_SERVER['HTTP_HOST'] . "/export/xml/");
        $this->data("exportToJson", "https://" . $_SERVER['HTTP_HOST'] . "/export/json/");
        $this->data("exportToCsv", "https://" . $_SERVER['HTTP_HOST'] . "/export/csv/");
        $this->data("template", Consts::DOCUMENT_ROOT . "\\MikhailovIgor\\Views\\HomePage.php");
        $this->display(Consts::DOCUMENT_ROOT . "MikhailovIgor\\Views\\index.php");
    }

}