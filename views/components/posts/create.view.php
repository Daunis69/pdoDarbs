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

    <label>Kategorija
        <select name="category_id">
            <option value="">-- Izvēlieties kategoriju --</option>
            <?php foreach($categories as $category): ?>
                <option value="<?= $category['id'] ?>" <?= isset($_POST['category_id']) && $_POST['category_id'] == $category['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($category['category_name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>
     <?php if(isset($errors["category_id"])) { ?>
       <p><?= $errors["category_id"] ?></p>
     <?php } ?>

    <button type="submit">Iesniegt</button>
</form>

<?php require "views/components/footer.php"; ?>