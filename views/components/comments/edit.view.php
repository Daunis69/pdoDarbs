<?php require __DIR__ . '/../header.php'; ?>
<?php require __DIR__ . '/../navbar.php'; ?>

<h1>Rediģēt komentāru</h1>

<?php if (!empty($errors)): ?>
    <ul>
        <?php foreach ($errors as $e): ?>
            <li><?= htmlspecialchars($e) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form action="/comments/edit" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($comment['id']) ?>">
    <div class="form-group">
        <label>Autors:</label>
        <input type="text" name="author" value="<?= htmlspecialchars($comment['author'] ?? '') ?>">
    </div>
    <div class="form-group">
        <label>Komentārs:</label>
        <textarea name="coment" rows="6"><?= htmlspecialchars($comment['coment']) ?></textarea>
    </div>
    <div class="form-actions">
        <button type="submit">Saglabāt</button>
        <a href="/show?id=<?= htmlspecialchars($comment['postid']) ?>">Atpakaļ</a>
    </div>
</form>

<?php require __DIR__ . '/../footer.php'; ?>
