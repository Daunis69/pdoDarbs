<?php

if (!isset($_GET['id']) || $_GET['id'] === "") {
    redirectIfNotFound();
}

$sql = "SELECT posts.id, posts.content, posts.category_id, categories.category_name 
        FROM posts 
        LEFT JOIN categories ON posts.category_id = categories.id 
        WHERE posts.id = :id";
$params = ["id" => $_GET['id']];
$post = $db->query($sql, $params)->fetch();

if (!$post) {
    redirectIfNotFound();
}


// Fetch comments for this post (table name 'coments' per migration.sql)
$sql = "SELECT * FROM coments WHERE postid = :postid ORDER BY postdate DESC";
$params = ["postid" => $post["id"]];
$comments = $db->query($sql, $params)->fetchAll();

require "views/components/posts/show.view.php";