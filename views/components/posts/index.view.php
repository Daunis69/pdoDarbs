<?php require "views/components/header.php"; ?>
<?php require "views/components/navbar.php"; ?>

<h1>Blo222s</h1>
<form method='get'>
    <input name='search_query' value='<?= $_GET["search_query"] ?? "" ?>' />
    <button>Meklēt</button>
</form>

<?php if (count($posts) == 0) { ?>
    <p>❌ Nav atrasts neviens ieraksts. 😭 Lūdzu, pamēģini citu vārdu vai frāzi 🐣</p>
<?php } else { ?>
    <ul>
        <?php foreach($posts as $post) { ?>
            <li><a href="show?id=<?= $post["id"] ?>"> <?= $post["content"] ?></a></li>
        <?php } ?>
    </ul>
<?php } ?>

<?php require "views/components/footer.php"; ?>