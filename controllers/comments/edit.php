<?php

require __DIR__ . "/../../Validator.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'] ?? null;
    if (!$id || !is_numeric($id)) {
        header("Location: /");
        exit();
    }
    $comment = $db->query("SELECT * FROM coments WHERE id = :id", ['id' => $id])->fetch();
    if (!$comment) {
        header("Location: /");
        exit();
    }
    require __DIR__ . '/../../views/components/comments/edit.view.php';
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;
    $coment = trim((string)($_POST['coment'] ?? ''));
    $author = trim((string)($_POST['author'] ?? ''));

    if (!$id) {
        header("Location: /");
        exit();
    }

    $errors = [];
    if (!Validator::string($coment, min: 1, max: 5200)) {
        $errors['coment'] = 'Komentāram jābūt norādītam';
    }

    if (!empty($errors)) {
        $comment = $db->query("SELECT * FROM coments WHERE id = :id", ['id' => $id])->fetch();
        require __DIR__ . '/../../views/components/comments/edit.view.php';
        exit();
    }

    try {
        $db->query(
            "UPDATE coments SET coment = :coment, author = :author WHERE id = :id",
            ['coment' => $coment, 'author' => $author, 'id' => $id]
        );
    } catch (PDOException $e) {
        $db->query(
            "UPDATE coments SET coment = :coment WHERE id = :id",
            ['coment' => $coment, 'id' => $id]
        );
    }

    $post = $db->query("SELECT postid FROM coments WHERE id = :id", ['id' => $id])->fetch();
    $postid = $post ? $post['postid'] : null;
    header("Location: /show?id=" . ($postid ?? ''));
    exit();
}
