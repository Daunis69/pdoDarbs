<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: /categories');
    exit;
}

if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
    header('Location: /categories');
    exit;
}

$id = (int) $_POST['id'];

// Check for existing posts linked to this category
$countRow = $db->query("SELECT COUNT(*) AS cnt FROM posts WHERE category_id = :id", ['id' => $id])->fetch();
if ($countRow && $countRow['cnt'] > 0) {
    // Redirect back to categories list with an error message
    header('Location: /categories?error=cannot_delete_category_in_use');
    exit;
}

    $db->query("DELETE FROM categories WHERE id = :id", ['id' => $id]);

    header('Location: /categories?success=category_deleted');
exit;
