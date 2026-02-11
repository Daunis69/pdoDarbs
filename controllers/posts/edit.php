<?php

    require "Validator.php";

    $sql = "SELECT * FROM posts WHERE id = :id";
    $params = ["id" => $_GET['id']];
    $post = $db->query($sql, $params)->fetch();

    // Fetch categories for the select box
    $sql = "SELECT id, category_name FROM categories ORDER BY category_name ASC";
    $categories = $db->query($sql)->fetchAll();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $errors = [];
        if (!Validator::string($_POST["content"], min: 1, max: 50)) {
            $errors["content"] = "Saturam jābūt ievadītam, bet ne garākam par 50 rakstzīmēm";
        }
        if (!isset($_POST["category_id"]) || !is_numeric($_POST["category_id"])) {
            $errors["category_id"] = "Lūdzu, izvēlieties kategoriju";
        }

        if (empty($errors)) {
            $sql = "UPDATE posts SET content = :content, category_id = :category_id WHERE id = :id";
            $params = [
                "content" => $_POST["content"],
                "category_id" => (int)$_POST["category_id"],
                "id" => $_GET["id"]
            ];
            $db->query($sql, $params);

            header("Location: /");
            exit();
        }
    }
   


require "./views/components/posts/edit.view.php";