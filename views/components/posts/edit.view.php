<?php require "views/components/header.php"; ?>
<?php require "views/components/navbar.php"; ?>

<h1>Rediģēt ierakstu</h1>



<form method="POST">
  <h1><?= htmlspecialchars($post["content"]) ?></h1>

  <label>Bloga teksts
      <input name="content" value="<?= htmlspecialchars($_POST['content'] ?? $post['content'])?>" >
  </label>
  <?php if(isset($errors["content"])) { ?>
    <p><?= htmlspecialchars($errors["content"]) ?></p>
  <?php } ?>

  <label>Kategorija
      <select name="category_id">
          <option value="">-- Izvēlieties kategoriju --</option>
          <?php foreach($categories as $category): ?>
              <option value="<?= $category['id'] ?>" <?= (isset($_POST['category_id']) ? $_POST['category_id'] : $post['category_id']) == $category['id'] ? 'selected' : '' ?> >
                  <?= htmlspecialchars($category['category_name']) ?>
              </option>
          <?php endforeach; ?>
      </select>
  </label>
  <?php if(isset($errors["category_id"])) { ?>
    <p><?= htmlspecialchars($errors["category_id"]) ?></p>
  <?php } ?>

  <input name="id" value="<?= htmlspecialchars($post['id'])?>" type="hidden">
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
