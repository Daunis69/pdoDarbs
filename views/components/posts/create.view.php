<?php require "views/components/header.php"; ?>
<?php require "views/components/navbar.php"; ?>

<h1>Izveidot jaunu ierakstu</h1>

<form method="POST">
    <label>Bloga teksts
        <input name="content" value="<?= htmlspecialchars($_POST['content'] ?? '')?>" >
    </label>
     <?php if(isset($errors["content"])) { ?>
       <p><?= $errors["content"] ?></p>
     <?php } ?>
    <button type="submit">Iesniegt</button>
</form>

<?php require "views/components/footer.php"; ?>