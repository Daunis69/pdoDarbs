<?php ob_start(); ?>

<h1>Kategorijas</h1>
<?php if (isset($_GET['error']) && $_GET['error'] === 'cannot_delete_category_in_use'): ?>
    <div class="errors">⚠️ Kategorija nevar tikt izdzēsta — tajā ir saistīti ieraksti. Lūdzu, izdzēsiet vai pārvietojiet ierakstus vispirms.</div>
<?php elseif (isset($_GET['success']) && $_GET['success'] === 'category_deleted'): ?>
    <div class="success">✅ Kategorija veiksmīgi izdzēsta.</div>
<?php endif; ?>
<form method='get'>
    <input name='search_query' value='<?= $_GET["search_query"] ?? "" ?>' />
    <button>Meklēt</button>
</form>

<?php if (count($categories) == 0) { ?>
    <p>❌ Nav atraststa neviena kategorija. 😭 Lūdzu, pamēģini citu kategoriju. 🐣</p>
<?php } else { ?>
    <ul>
        <?php foreach($categories as $category) { ?>
            <li><a href="show-cat?id=<?= $category["id"] ?>"> <?= $category["category_name"] ?></a></li>
        <?php } ?>
    </ul>
<?php } ?>

<?php $content = ob_get_clean(); ?>
<?php require "./views/layout.php"; ?>  