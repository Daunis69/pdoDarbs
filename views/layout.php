<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? "Emuārs" ?></title>
    <link rel="stylesheet" href="/pdoDarbs/css/style.css">
</head>
<body>
    <?php require "views/components/navbar.php"; ?>
    
    <main>
        <?= $content ?>
    </main>
    
    <?php require "views/components/footer.php"; ?>
</body>
</html>