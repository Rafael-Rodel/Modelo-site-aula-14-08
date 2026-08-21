# Modelo Site PHP

Projeto desenvolvido em **PHP, HTML e CSS** com o objetivo de criar uma estrutura para um site de artigos/notícias.

O projeto utiliza componentes PHP para evitar a repetição de elementos como cabeçalho, rodapé, artigos, cards e barra lateral.

## Tecnologias

* PHP
* HTML5
* CSS3
* XAMPP/Apache para execução local

## Estrutura do projeto

```text
projeto/
├── assets/
│   ├── images/
│   │   ├── luna.jpg
│   │   ├── mordecai.jpg
│   │   ├── rigby.jpg
│   │   └── woody.jpg
│   ├── corvoCard01.png
│   ├── logo-generic.png
│   ├── marketing.jpg
│   └── style.css
│
├── components/
│   ├── cardsArticle.php
│   └── functions.php
│
├── include/
│   ├── article.php
│   ├── aside.php
│   ├── footer.php
│   ├── header.php
│   └── index.html
│
├── index.php
├── marketing.php
├── noticia.php
├── noticia.css
└── README.md
```

## Funcionamento

### Página inicial

O arquivo `index.php` funciona como página principal.

Ele utiliza componentes PHP através de `include_once`, permitindo reutilizar partes da interface.

A estrutura principal inclui:

```php
include_once("./include/header.php");
include_once("./include/article.php");
include_once("./components/cardsArticle.php");
include_once("./include/aside.php");
include_once("./include/footer.php");
```

Dessa maneira, cada responsabilidade fica separada em um arquivo.

---

## Header

O cabeçalho está localizado em:

```text
include/header.php
```

O menu de navegação é definido através de um array PHP:

```php
$menu = [
    "Home" => "./index.php",
    "Marketing" => "./marketing.php",
    "Internet" => "internet.php",
    "Ganhar Dinheiro" => "ganhar-dinheiro.php",
    "Webmaster" => "webmaster.php",
    "Scripts" => "scripts.php",
    "Software" => "software.php",
    "Comércio Eletrônico" => "comercio-eletronico.php",
    "Downloads" => "downloads.php",
    "Contato" => "contato.php"
];
```

Depois, o menu é criado dinamicamente utilizando `foreach`.

Isso permite adicionar ou remover opções de navegação alterando apenas o array.

---

## Artigo em destaque

O componente responsável pelo artigo principal está em:

```text
include/article.php
```

Ele possui a função:

```php
article($titulo, $artigo, $imagem)
```

### Parâmetros

* `$titulo` — categoria ou título da seção.
* `$artigo` — título do artigo apresentado.
* `$imagem` — caminho da imagem utilizada no destaque.

### Exemplo

```php
echo article(
    "DESTAQUES",
    "Corvos são a nova tendência!",
    "./assets/corvoCard01.png"
);
```

A função gera automaticamente o HTML necessário para apresentar o artigo.

Também é criado um link **LEIA MAIS**, responsável por encaminhar o usuário para `noticia.php`.

---

## Cards de artigos

Os cards são gerados pelo arquivo:

```text
components/cardsArticle.php
```

A função utilizada é:

```php
cardsArticle($cardTitulo, $artigoDestaque, $mais)
```

### Parâmetros

* `$cardTitulo` — título da categoria.
* `$artigoDestaque` — artigo principal do card.
* `$mais` — array contendo outros artigos.

### Exemplo

```php
cardsArticle(
    "PROGRAMAÇÃO",
    "A ascensão python",
    [
        "Artigo1",
        "Artigo1",
        "Artigo1",
        "Artigo1"
    ]
);
```

A função percorre o array utilizando `foreach` e cria automaticamente a lista de artigos.

Os valores exibidos são tratados com `htmlspecialchars()` antes de serem inseridos no HTML.

---

## Página de notícia

A página:

```text
noticia.php
```

é responsável por apresentar individualmente um artigo.

Algumas informações são recebidas através de parâmetros da URL.

Exemplo de navegação:

```text
noticia.php?titulo=DESTAQUES&artigo=Corvos
```

O artigo é recuperado através de:

```php
$artigo = $_GET['artigo'];
```

A imagem também pode ser enviada pela URL.

Quando nenhuma imagem é informada, o sistema utiliza uma imagem padrão.

---

## Aside

A barra lateral está localizada em:

```text
include/aside.php
```

Ela contém:

* campo de pesquisa;
* seção de artigos mais lidos;
* galeria de imagens em destaque.

Por estar separada da página principal, ela pode ser reutilizada em diferentes páginas através de:

```php
include_once("./include/aside.php");
```

---

## Footer

O rodapé está localizado em:

```text
include/footer.php
```

Ele contém links institucionais, área de acompanhamento/redes e identificação de copyright.

Assim como os demais componentes, pode ser reutilizado nas páginas com:

```php
include_once("./include/footer.php");
```

---

## Estilização

A principal folha de estilos está localizada em:

```text
assets/style.css
```

O projeto utiliza variáveis CSS para centralizar as principais cores:

```css
:root {
    --main-color: rgb(119, 119, 119);
    --secondary-color: rgb(56, 56, 56);
    --main-font-color: rgb(248, 248, 248);
    --secondary-font-color: rgb(167, 190, 206);
    --button-color: rgb(72, 90, 95);
}
```

Isso facilita alterações futuras na identidade visual do site.

A página individual de notícias possui também sua própria estilização:

```text
noticia.css
```

---

## Criando uma nova página

Para criar uma nova categoria seguindo o padrão atual, pode-se utilizar a seguinte estrutura:

```php
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoria</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>

<?php
include_once("./include/header.php");
?>

<main>

    <article class="container_artigos">

        <?php
        include_once("./include/article.php");

        echo article(
            "CATEGORIA",
            "Título do artigo",
            "./assets/imagem.jpg"
        );
        ?>

    </article>

    <?php
    include_once("./include/aside.php");
    ?>

</main>

<?php
include_once("./include/footer.php");
?>

</body>
</html>
```

Depois, basta adicionar a página ao array `$menu` presente em `include/header.php`.

---

## Executando o projeto

Como o projeto utiliza PHP, os arquivos não devem ser executados apenas abrindo `index.php` diretamente pelo navegador.

É necessário utilizar um servidor com suporte a PHP.

### Utilizando XAMPP

Coloque o projeto dentro da pasta do servidor Apache.

No Linux, normalmente:

```text
/opt/lampp/htdocs/
```

Exemplo:

```text
/opt/lampp/htdocs/modelo-site/
```

Inicie o Apache pelo XAMPP.

Depois acesse pelo navegador:

```text
http://localhost/modelo-site/
```

O arquivo `index.php` será utilizado como página inicial.

---

## Organização

A arquitetura do projeto segue uma separação simples:

```text
Páginas
   ↓
index.php / marketing.php / noticia.php
   ↓
Componentes reutilizáveis
   ↓
header / footer / aside / article / cardsArticle
   ↓
Estilização e arquivos estáticos
   ↓
assets/
```

Essa estrutura reduz a duplicação de código e facilita alterações globais.

Por exemplo, uma alteração realizada em `header.php` será refletida nas páginas que incluem esse arquivo.

## Estado atual

O projeto possui uma estrutura inicial funcional para criação de páginas de conteúdo utilizando PHP.

