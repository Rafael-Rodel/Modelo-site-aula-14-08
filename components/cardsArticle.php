<?php
function cardsArticle($cardTitulo, $artigoDestaque, $mais)
{
    // 1. Criamos uma variável vazia para armazenar as linhas da lista (<li>)
    $itensLista = "";

    // 2. Percorremos o array $mais para gerar a estrutura de cada artigo secundário
    foreach ($mais as $artigo) {
        $itensLista .= "<li>" . htmlspecialchars($artigo) . "</li>";
    }

    // 3. Retornamos o HTML completo, injetando os itens gerados na variável $itensLista
    return "
        <div class='card-article'>
            <header class='card-header'>" . htmlspecialchars($cardTitulo) . "</header>
            <div class='card-container'>
                <div class='artigo-destaque'>
                    <h2>" . htmlspecialchars($artigoDestaque) . "</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, placeat molestias! Voluptas quos perferendis dolor voluptates, suscipit facilis voluptate dolores fugiat aliquam saepe repellat esse consequuntur soluta beatae debitis inventore!</p>
                    <div class='btn-leia-mais'>
                        <button onclick=window.location.href='./noticia.php?titulo=" . urlencode($cardTitulo) . "&artigo=". urlencode($artigoDestaque) ."'>LEIA MAIS</button>
                    </div>
                </div>
                
                <h2>MAIS ARTIGOS</h2>
                <div class='mais-artigos'>
                    <ul>
                        $itensLista
                    </ul>
                </div>
            </div>
        </div>";
}
?>
