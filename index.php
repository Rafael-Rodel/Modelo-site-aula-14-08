<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

    <?php
    include_once("./include/header.php")
        ?>

    <div>
        <?php
        include_once("./include/article.php")
            ?>
        <?php
        include_once("./components/cardsArticle.php");
        echo cardsArticle("PROGRAMAÇÃO")
            ?>
    </div>

    <?php
    include_once('./include/aside.php');
    ?>

</body>

</html>