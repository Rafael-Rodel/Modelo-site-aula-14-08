<?php
function cardsArticle($cardTitulo)
{
    return (
        "<div class='card-article'>
            <header class='card-header'><h3>" . $cardTitulo . "</h3></header>
            <div class='card-container'>
                <div class='artigo-destaque'>
                    <h2>Artigo em destaque</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, placeat molestias! Voluptas quos perferendis dolor voluptates, suscipit facilis voluptate dolores fugiat aliquam saepe repellat esse consequuntur soluta beatae debitis inventore!</p>
                    <div class='btn-leia-mais'>
                        <button>LEIA MAIS</button>
                    </div>
                </div>
                
                <h2 class='mais'>MAIS ARTIGOS</h2>
                <div class='mais-artigos'>
                    <ul>
                        <li>Artigo sla eu</li>
                        <li>Artigo sla eu</li>
                        <li>Artigo sla eu</li>
                        <li>Artigo sla eu</li>
                    </ul>
                </div>
            </div>
        </div>"
    );
}
;
?>