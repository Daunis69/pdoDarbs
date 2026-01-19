<?php
    require_once "functions.php" ;
   // dd(parse_url($_SERVER["REQUEST_URI"])); 
    $uri = parse_url($_SERVER["REQUEST_URI"])["path"];

    if ($uri === '/pdoDarbs/' || $uri === '/pdoDarbs') {
        require 'controllers/index.php';
    } elseif ($uri === '/pdoDarbs/about') {
        require 'controllers/story.php';
    } elseif ($uri === '/pdoDarbs/categories') {
        require 'controllers/categories.php';
    } else {
        http_response_code(404);
        echo "<p>Atvainojiet, lapa netika atrasta!</p>";
        die();
    }
?>