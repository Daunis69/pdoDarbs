<?php

require_once "functions.php";
require_once "Database.php";
$config = require "config.php";
$customStyles = "story.css";

$db = new Database($config["database"]);
$sql_query = "SELECT * FROM posts";
$params = [];

if(isset($_GET["search_query"]) && trim($_GET["search_query"]) != "") {
    $sql_query = "SELECT * FROM posts WHERE content LIKE :search";
    $params["search"] = "%" . $_GET["search_query"] . "%";
}

$posts = $db->query($sql_query, $params)->fetchAll(PDO::FETCH_ASSOC);




require "./views/index.view.php";