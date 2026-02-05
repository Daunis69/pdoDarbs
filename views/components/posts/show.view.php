 <?php require "views/components/header.php"; ?>
<?php require "views/components/navbar.php"; ?>

<h1><?= htmlspecialchars($post["content"] ?? '') ?></h1>

<?php if (!empty($post["category_name"])): ?>
    <p><strong>Kategorija:</strong> <?= htmlspecialchars($post["category_name"]) ?></p>
<?php endif; ?>

<a href="editt?id=<?= $post["id"] ?>"> Rediget ierakstu </a>

<?php require "views/components/footer.php"; ?>

<form action="/pdoDarbs/delete" method="POST">
    <input type="hidden" name="id" value="<?= $post['id'] ?>">

    <button type="submit">
        Dzēst ierakstu
    </button>
</form>
