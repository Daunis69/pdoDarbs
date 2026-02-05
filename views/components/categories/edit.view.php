<?php require "views/components/header.php"; ?>
<?php require "views/components/navbar.php"; ?>

<h1>Rediģēt ierakstu</h1>



<form method="POST">
  <h1><?= htmlspecialchars($category["category_name"] ?? '') ?></h1>
  <input name="category_name" value="<?= htmlspecialchars($_POST['category_name'] ?? $category['category_name'])?>" >
  <input name="id" value="<?= htmlspecialchars($category['id'])?>" type="hidden"> 
  <button type="submit">Iesniegt</button>
</form>
<?php if (!empty($errors)): ?>
  <div style="color: red;"> 
    <?php foreach ($errors as $error): ?>
      <p><?= htmlspecialchars($error) ?></p>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
  <?php require "views/components/footer.php"; ?>
