<?php require "views/components/header.php"; ?>
<?php require "views/components/navbar.php"; ?>

<h1>Izveidot jaunu komentāru</h1>

<form method="POST">
    <label>Komentārs
        <input name="coment" value="<?= htmlspecialchars($_POST['coment'] ?? '')?>" >
    </label>
     <?php if(isset($errors["coment"])) { ?>
       <p><?= $errors["coment"] ?></p>
     <?php } ?>

    <label>Autors
        <input name="author" value="<?= htmlspecialchars($_POST['author'] ?? '')?>" >
    </label>

    <input type="hidden" name="postid" value="<?= htmlspecialchars($_POST['postid'] ?? '') ?>">

    <button type="submit">Iesniegt</button>
</form>

<?php require "views/components/footer.php"; ?>
