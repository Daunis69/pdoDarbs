<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: /pdoDarbs/");
    exit();
}

$postid = $_POST['postid'] ?? null;
$coment = trim((string)($_POST['coment'] ?? ''));
$author = trim((string)($_POST['author'] ?? ''));

if (!$postid) {
    header("Location: /pdoDarbs/");
    exit();
}
try {
    $db->query(
        "INSERT INTO coments (coment, postdate, postid, author) VALUES (:coment, NOW(), :postid, :author)",
        ['coment' => $coment, 'postid' => (int)$postid, 'author' => $author]
    );
} catch (PDOException $e) {
    $full = $author !== '' ? $author . ' — ' . $coment : $coment;
    $db->query(
        "INSERT INTO coments (coment, postdate, postid) VALUES (:coment, NOW(), :postid)",
        ['coment' => $full, 'postid' => (int)$postid]
    );
}

header("Location: /pdoDarbs/show?id=" . (int)$postid);
exit();
