<?php

function dd($value) {
    echo "<pre>";
       
var_dump($value);
    echo "</pre>";
die()
;
}

function redirectIfNotFound($location = "/pdoDarbs/") {
    http_response_code(404);
    header("Location: $location", 302);
    exit();
}
