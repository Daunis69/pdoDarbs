<?php require "views/components/header.php"; ?>
<?php require "views/components/navbar.php"; ?>

<h1><?= htmlspecialchars($post["content"] ?? '') ?></h1>

<?php if (!empty($post["category_name"])): ?>
    <p><strong>Kategorija:</strong> <?= htmlspecialchars($post["category_name"]) ?></p>
<?php endif; ?>

<div class="inline-actions">
    <a href="editt?id=<?= $post["id"] ?>">Rediget ierakstu</a>
    <form action="/pdoDarbs/delete" method="POST">
        <input type="hidden" name="id" value="<?= $post['id'] ?>">
        <button type="submit">Dzēst ierakstu</button>
    </form>
</div>

<hr>
<section id="comments">
    <h2>Komentāri</h2>

    <?php if (!empty($comments)): ?>
        <?php foreach ($comments as $c): ?>
            <div class="comment">
                <?php if (isset($c['author'])): ?>
                    <p><strong>Autors:</strong> <?= htmlspecialchars($c['author']) ?></p>
                <?php endif; ?>
                <p><?= nl2br(htmlspecialchars($c['coment'])) ?></p>
                <?php if (!empty($c['postdate'])): ?>
                    <small><?= htmlspecialchars($c['postdate']) ?></small>
                <?php endif; ?>

                <div class="comment-actions inline-actions">
                    <a href="/pdoDarbs/comments/edit?id=<?= $c['id'] ?>">Rediģēt</a>
                    <form action="/pdoDarbs/comments/delete" method="POST">
                        <input type="hidden" name="id" value="<?= $c['id'] ?>">
                        <button type="submit">Dzēst</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Vēl nav komentāru.</p>
    <?php endif; ?>

    <h3>Izveidot komentāru</h3>
    <form action="/pdoDarbs/comments/create" method="POST">
        <input type="hidden" name="postid" value="<?= $post['id'] ?>">
        <div class="form-group">
            <label>Autors:</label>
            <input type="text" name="author" maxlength="255">
        </div>
        <div class="form-group">
            <label>Komentārs:</label>
            <textarea name="coment" rows="4"></textarea>
        </div>
        <div class="form-actions">
            <button type="submit">Komentēt</button>
        </div>
    </form>

</section>

<?php require "views/components/footer.php"; ?>
