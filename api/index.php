<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
                "DESTAQUES",
                "Corvos são a nova tendência!",
                "/assets/corvoCard01.png"
            );
            ?>

            <?php
            include_once(__DIR__ . "/../components/cardsArticle.php");

            echo "<section class='cards-container'>" .
                cardsArticle(
                    "PROGRAMAÇÃO",
                    "A ascensão python",
                    ["Artigo1", "Artigo1", "Artigo1", "Artigo1"]
                ) .
                cardsArticle(
                    "PROGRAMAS E APLICATIVOS",
                    "Como o Instagram trata seus dados?",
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