<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Kategorijas</h1>
<form method='get'>
<input name='search_query' />
<button>Meklēt</button>
</form>
<ul>
<?php if (count($categories) == 0) { ?>
    <p>❌ Nav atraststa neviena kategorija. 😭 Lūdzu, pamēģini citu kategoriju. 🐣</p>
        <?php } else { ?>
            <ul>
       <? foreach($categories as $category) {
    echo "<li>" . $category["category_name"] . "</li>";
    }
    ?>
</ul>
 <?php } ?>
</body>
</html>