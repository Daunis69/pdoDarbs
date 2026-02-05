<?php require "views/components/header.php"; ?>
<?php require "views/components/navbar.php"; ?>

<h1>Izveidot jaunu Kategoriju</h1>

<form method="POST">
    <label>Kategoriju nosaukums
        <input name="category_name" value="<?= htmlspecialchars($_POST['category_name'] ?? '')?>" >
    </label>
     <?php if(isset($errors["category_name"])) { ?>
       <p><?= $errors["category_name"] ?></p>
     <?php } ?>
    <button type="submit">Iesniegt</button>
</form>

<?php require "views/components/footer.php"; ?>