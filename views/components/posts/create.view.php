<?php require "views/components/header.php"; ?>
<?php require "views/components/navbar.php"; ?>

<h1>Izveidot jaunu ierakstu</h1>

<?php if (isset($error)): ?>
    <p style="color: red;"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="POST">
    <label>Bloga nosaukums
        <input name="title" value="<?= htmlspecialchars($_POST['title'] ?? '') ?>" required />
    </label>
    
    <label>Bloga teksts
        <textarea name="content" required><?= htmlspecialchars($_POST['content'] ?? '') ?></textarea>
    </label>
    
    <button type="submit">Iesniegt</button>
</form>

<?php require "views/components/footer.php"; ?>