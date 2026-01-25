<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Pārbauda vai abi lauki ir aizpildīti
    if (empty($_POST["title"]) || empty($_POST["content"])) {
        $error = "Lūdzu aizpildiet visus laukus!";
    } else {
        $sql = "INSERT INTO posts (title, content) VALUES (:title, :content)";

        $params = [
            "title" => $_POST["title"],
            "content" => $_POST["content"]
        ];

        $db->query($sql, $params);

        header("Location: /pdoDarbs/");
        exit();
    }
}

require "./views/components/posts/create.view.php";