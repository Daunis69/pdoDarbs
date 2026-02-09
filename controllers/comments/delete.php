<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: /pdoDarbs/");
    exit();
}

$id = $_POST['id'] ?? null;
if (!$id) {
    header("Location: /pdoDarbs/");
    exit();
}

$post = $db->query("SELECT postid FROM coments WHERE id = :id", ['id' => $id])->fetch();
$db->query("DELETE FROM coments WHERE id = :id", ['id' => $id]);

if (!empty($post['postid'])) {
    header("Location: /pdoDarbs/show?id=" . (int)$post['postid']);
} else {
    header("Location: /pdoDarbs/");
}
exit();
