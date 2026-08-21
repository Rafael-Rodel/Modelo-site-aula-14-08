<?php

$menu = [
    "Home" => "index.php",
    "Marketing" => "marketing.php",
    "Internet" => "internet.php",
    "Ganhar Dinheiro" => "ganhar-dinheiro.php",
    "Webmaster" => "webmaster.php",
    "Scripts" => "scripts.php",
    "Software" => "software.php",
    "Comércio Eletrônico" => "comercio-eletronico.php",
    "Downloads" => "downloads.php",
    "Contato" => "contato.php"
];

?>

<link rel="stylesheet" href="assets/style.css">
<header class="header">

    <div class="header-topo">
    </div>

    <nav class="navbar">

        <ul>

            <?php foreach ($menu as $nome => $link): ?>

                <li>
                    <a href="<?= $link ?>">
                        <?= $nome ?>
                    </a>
                </li>
                <p></p>

            <?php endforeach; ?>

        </ul>

    </nav>

</header>