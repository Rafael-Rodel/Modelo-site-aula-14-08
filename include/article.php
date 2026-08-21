<?php

function article($titulo, $artigo) {
    return '<section>

    <div class="cardDestaque">

        <h3 class="destaque">'.$titulo.'</h3>

        <div class="contentDestaque">

            <div class="imagemDestaque">
                <img src="./assets/corvoCard01.png" alt="">
            </div>

            <div class="textDestaque">

                <h4>'.$artigo.'</h4>

                <p>
                    Os corvos estão conquistando cada vez mais espaço e se
                    tornando a nova tendência! Misteriosos, inteligentes e
                    cheios de personalidade, eles chegaram para transformar
                    o visual com um toque sombrio e fascinante.
                </p>

                <a href="./noticia.php?titulo=' . urlencode($titulo) . '&artigo='. urlencode($artigo) .'">LEIA MAIS</a>

            </div>

        </div>

    </div>

</section>';
}

?>