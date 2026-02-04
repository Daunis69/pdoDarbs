<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /posts');
    exit;
}

if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
    header('Location: /posts');
    exit;
}

$id = (int) $_POST['id'];

$db->query("DELETE FROM posts WHERE id = :id", ['id' => $id]);

header('Location: /pdoDarbs/');
exit;
