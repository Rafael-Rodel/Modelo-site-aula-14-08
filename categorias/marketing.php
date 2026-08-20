<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoria</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>


    <?php
    include_once("./include/header.php")
        ?>

    <main>
        <article class="container_artigos">
            <?php
            include_once("./include/article.php")
                ?>
            <?php
            include_once("./components/cardsArticle.php");
            echo "<section class='cards-container'>" . cardsArticle("PROGRAMAÇÃO") . cardsArticle("PROGRAMAS E APLICATIVOS") . "</section>";
            ?>
        </article>

        <?php
        include_once('./include/aside.php');
        ?>

    </main>
    <?php
    include_once('./include/footer.php');
    ?>

</body>

</html>