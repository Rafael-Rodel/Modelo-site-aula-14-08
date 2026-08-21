<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Template Basico</title>
    <link rel="stylesheet" href="./noticia.css">
</head>

<body>
    <?php
    include_once("./include/header.php")
        ?>
    <main>
        <div class="primeira-pagina">
            <h1>
                <?php
                $artigo = $_GET['artigo'];
                echo $artigo;
                ?>
            </h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos dolores expedita tenetur corrupti ab
                doloribus modi velit</p>

            <?php
$imagem = $_GET['imagem'] ?? "https://visitrio.com.br/wp-content/uploads/2024/10/por-do-sol-no-rio.jpg";

echo "<img src='" . htmlspecialchars($imagem) . "'>";
?>
        </div>
        <div class="paragrafos">
            <div class="texto1">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati dolor, suscipit sunt magni odit
                    praesentium ea atque explicabo at nostrum velit quas vero dolorem excepturi architecto. Omnis
                    dolorum id cumque.
                    Perspiciatis iusto exercitationem hic iste eos repudiandae omnis, soluta aut asperiores, accusantium
                    fuga cumque! Sapiente sunt ipsam suscipit accusantium quam quasi, enim totam, earum vitae amet
                    recusandae similique blanditiis sint.
                </p>
            </div>
            <div class="texto2">
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus repellendus sequi quod? Ea nesciunt
                    quasi itaque culpa sapiente officiis, pariatur, optio accusamus veniam cumque exercitationem
                    provident facere aliquid rem molestiae.
                    Corrupti architecto incidunt ex consequuntur maxime possimus sapiente non autem facere, tenetur
                    ipsum, recusandae molestias nesciunt tempore earum reprehenderit! Minima enim architecto aliquid
                    neque quam velit commodi officiis soluta delectus.
                </p>
            </div>
        </div>
    </main>

    <?php
    include_once('./include/footer.php');
    ?>
    <script src="./sript.js"></script>
</body>

</html>