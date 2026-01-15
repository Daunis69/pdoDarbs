<?php ob_start(); ?>

<h1>Kategorijas</h1>
<form method='get'>
    <input name='search_query' value='<?= $_GET["search_query"] ?? "" ?>' />
    <button>Meklēt</button>
</form>

<?php if (count($categories) == 0) { ?>
    <p>❌ Nav atraststa neviena kategorija. 😭 Lūdzu, pamēģini citu kategoriju. 🐣</p>
<?php } else { ?>
    <ul>
        <?php foreach($categories as $category) { ?>
            <li><?= $category["category_name"] ?></li>
        <?php } ?>
    </ul>
<?php } ?>

<?php $content = ob_get_clean(); ?>
<?php require "./views/layout.php"; ?>