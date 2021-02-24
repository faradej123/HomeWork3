<?php

return [
    "" => [
        "GET" => [
            "controller" => "\\controllers\\HomeController",
            "action" => "home",
            "params" => "",
        ],
    ],
    "asdsd/sd/(.*)/gfd/(.*)/eee" => [
        "GET" => [
            "controller" => "\\controllers\\HomeController",
            "action" => "home",
            "params" => "$2/$1",
        ],
    ],
    "section" => [
        "GET" => [
            "controller" => "\\controllers\\HomeController",
            "action" => "section",
            "params" => "",
        ],
    ],
];