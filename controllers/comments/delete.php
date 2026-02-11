<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: /");
    exit();
}

$id = $_POST['id'] ?? null;
if (!$id) {
    header("Location: /");
    exit();
}

$post = $db->query("SELECT postid FROM coments WHERE id = :id", ['id' => $id])->fetch();
$db->query("DELETE FROM coments WHERE id = :id", ['id' => $id]);

if (!empty($post['postid'])) {
    header("Location: /show?id=" . (int)$post['postid']);
} else {
    header("Location: /");
}
exit();
