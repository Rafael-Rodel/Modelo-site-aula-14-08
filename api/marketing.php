<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketing</title>
    <link rel="stylesheet" href="/assets/style.css">
</head>

<body>

    <?php
    include_once(__DIR__ . "/../include/header.php");
    ?>

    <main>
        <article class="container_artigos">

            <?php
            include_once(__DIR__ . "/../include/article.php");

            echo article(
                "Marketing",
                "Marketing é foda",
                "/assets/marketing.jpg"
            );
            ?>

            <?php
            include_once(__DIR__ . "/../components/cardsArticle.php");

            echo "<section class='cards-container'>" .
                cardsArticle(
                    "Publicidade",
                    "A ascensão da publicidade",
                    ["Artigo1", "Artigo1", "Artigo1", "Artigo1"]
                ) .
                cardsArticle(
                    "Propaganda",
                    "Qual a diferença?",
                    ["Artigo1", "Artigo1", "Artigo1", "Artigo1"]
                ) .
                "</section>";
            ?>

        </article>

        <?php
        include_once(__DIR__ . "/../include/aside.php");
        ?>

    </main>

    <?php
    include_once(__DIR__ . "/../include/footer.php");
    ?>

</body>

</html>