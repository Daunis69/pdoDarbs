 <?php require "views/components/header.php"; ?>
<?php require "views/components/navbar.php"; ?>

<h1><?= htmlspecialchars($category["category_name"]) ?></h1>

<a href="editt-cat?id=<?= $category["id"] ?>"> Rediget Kategoriju </a>

<?php require "views/components/footer.php"; ?>

<form action="/delete-cat" method="POST">
    <input type="hidden" name="id" value="<?= $category['id'] ?>">

    <button type="submit">
        Dzēst Kategoriju
    </button>
</form>
