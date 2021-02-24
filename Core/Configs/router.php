<?php

return [
    "" => [
        "GET" => [
            "controller" => "MikhailovIgor\\Controllers\\HomePageController",
            "action" => "showUrls",
            "params" => "",
        ],
    ],
    "export/(.*)" => [
        "GET" => [
            "controller" => "\\MikhailovIgor\\Controllers\\ExportController",
            "action" => "makeExport",
            "params" => "$1",
        ],
    ],
];

/*return [
    "/" => [
        "GET" => [
            "controller" => "MikhailovIgor\\Controllers\\HomePageController",
            "action" => "showUrls",
        ],
    ],
    "/hw1" => [
        "GET" => [
            "controller" => "MikhailovIgor\\Controllers\\HomeWork1Controller",
            "action" => "showHomeWork",
        ],
    ],
    "/hw2" => [
        "GET" => [
            "controller" => "MikhailovIgor\\Controllers\\HomeWork2Controller",
            "action" => "showHomeWork",
        ],
    ],
];*/