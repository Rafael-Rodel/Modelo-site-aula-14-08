# Modelo Site PHP

Projeto desenvolvido em **PHP, HTML e CSS** com o objetivo de criar uma estrutura para um site de artigos e notícias.

O projeto utiliza componentes PHP reutilizáveis para evitar a repetição de elementos como cabeçalho, rodapé, artigos, cards e barra lateral.

O projeto pode ser executado localmente utilizando **XAMPP/Apache** e também está configurado para realizar o deploy na **Vercel** utilizando funções PHP.

---

## Tecnologias

- PHP
- HTML5
- CSS3
- XAMPP/Apache
- Vercel

---

## Estrutura do projeto

```text
projeto/

├── api/
│   ├── index.php
│   ├── marketing.php
│   └── noticia.php
│
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
├── noticia.css
├── vercel.json
└── README.md
```

---

## Funcionamento

O projeto possui três páginas PHP principais:

- `index.php` — página inicial;
- `marketing.php` — página da categoria Marketing;
- `noticia.php` — página individual de uma notícia.

Esses arquivos estão localizados dentro da pasta `api/` para que possam ser executados como funções PHP durante o deploy na Vercel.

Os demais arquivos do projeto, como componentes, imagens e folhas de estilo, permanecem organizados nas pastas correspondentes.

---

## Configuração da Vercel

O projeto utiliza o arquivo `vercel.json` para configurar a execução dos arquivos PHP.

```json
{
  "version": 2,
  "functions": {
    "api/*.php": {
      "runtime": "vercel-php@0.9.0"
    }
  },
  "rewrites": [
    {
      "source": "/",
      "destination": "/api/index.php"
    },
    {
      "source": "/marketing.php",
      "destination": "/api/marketing.php"
    },
    {
      "source": "/noticia.php",
      "destination": "/api/noticia.php"
    }
  ]
}
```

A pasta `api/` contém os arquivos PHP que serão executados pela Vercel.

Os `rewrites` permitem que o usuário acesse as páginas por URLs mais simples, sem precisar informar diretamente o caminho da pasta `api`.

Por exemplo:

```text
/
```

é direcionado internamente para:

```text
/api/index.php
```

Enquanto:

```text
/marketing.php
```

é direcionado para:

```text
/api/marketing.php
```

E:

```text
/noticia.php
```

é direcionado para:

```text
/api/noticia.php
```

---

## Página inicial

A página inicial está localizada em:

```text
api/index.php
```

Ela utiliza componentes PHP através de `include_once`, permitindo reutilizar partes da interface.

Os componentes utilizados são:

```php
include_once(__DIR__ . "/../include/header.php");

include_once(__DIR__ . "/../include/article.php");

include_once(__DIR__ . "/../components/cardsArticle.php");

include_once(__DIR__ . "/../include/aside.php");

include_once(__DIR__ . "/../include/footer.php");
```

O uso de `__DIR__` permite localizar corretamente os arquivos mesmo com os arquivos principais estando dentro da pasta `api`.

---

## Header

O cabeçalho está localizado em:

```text
include/header.php
```

O menu de navegação é definido através de um array PHP:

```php
$menu = [
    "Home" => "/",
    "Marketing" => "/marketing.php",
    "Internet" => "/internet.php",
    "Ganhar Dinheiro" => "/ganhar-dinheiro.php",
    "Webmaster" => "/webmaster.php",
    "Scripts" => "/scripts.php",
    "Software" => "/software.php",
    "Comércio Eletrônico" => "/comercio-eletronico.php",
    "Downloads" => "/downloads.php",
    "Contato" => "/contato.php"
];
```

O menu é criado dinamicamente utilizando `foreach`.

Isso permite adicionar ou remover opções de navegação alterando apenas o array.

O arquivo também utiliza o caminho absoluto para carregar a folha de estilos:

```html
<link rel="stylesheet" href="/assets/style.css">
```

---

## Artigo em destaque

O componente responsável pelo artigo principal está localizado em:

```text
include/article.php
```

Ele possui a função:

```php
article($titulo, $artigo, $imagem)
```

### Parâmetros

- `$titulo` — categoria ou título da seção;
- `$artigo` — título do artigo apresentado;
- `$imagem` — caminho da imagem utilizada no destaque.

### Exemplo

```php
echo article(
    "DESTAQUES",
    "Corvos são a nova tendência!",
    "/assets/corvoCard01.png"
);
```

A função gera automaticamente o HTML necessário para apresentar o artigo.

Também é criado um link **LEIA MAIS**, responsável por encaminhar o usuário para a página de notícia.

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

- `$cardTitulo` — título da categoria;
- `$artigoDestaque` — artigo principal do card;
- `$mais` — array contendo outros artigos.

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

A página individual de notícia está localizada em:

```text
api/noticia.php
```

Algumas informações são recebidas através de parâmetros da URL.

Exemplo:

```text
/noticia.php?artigo=Corvos
```

O artigo é recuperado através de:

```php
$artigo = $_GET['artigo'] ?? 'Artigo';
```

Caso nenhum artigo seja informado, é utilizado o texto padrão:

```text
Artigo
```

A imagem também pode ser enviada através da URL:

```text
/noticia.php?artigo=Corvos&imagem=https://exemplo.com/imagem.jpg
```

Quando nenhuma imagem é informada, o sistema utiliza uma imagem padrão.

O conteúdo recebido através da URL é tratado com `htmlspecialchars()` antes de ser exibido no HTML.

---

## Aside

A barra lateral está localizada em:

```text
include/aside.php
```

Ela contém:

- campo de pesquisa;
- seção de artigos mais lidos;
- galeria de imagens em destaque.

Por estar separada da página principal, pode ser reutilizada em diferentes páginas através de:

```php
include_once(__DIR__ . "/../include/aside.php");
```

---

## Footer

O rodapé está localizado em:

```text
include/footer.php
```

Ele contém links institucionais, área de acompanhamento/redes e identificação de copyright.

Assim como os demais componentes, pode ser reutilizado nas páginas através de:

```php
include_once(__DIR__ . "/../include/footer.php");
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

A página individual de notícias possui também sua própria folha de estilos:

```text
noticia.css
```

Os arquivos principais utilizam caminhos absolutos para acessar os recursos estáticos:

```html
<link rel="stylesheet" href="/assets/style.css">
```

e:

```html
<link rel="stylesheet" href="/noticia.css">
```

---

## Criando uma nova página

Para criar uma nova página PHP, o arquivo deve ser criado dentro da pasta:

```text
api/
```

Por exemplo:

```text
api/novaCategoria.php
```

Uma estrutura básica pode ser:

```php
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Categoria</title>

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
                "CATEGORIA",
                "Título do artigo",
                "/assets/imagem.jpg"
            );

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
```

Depois, é necessário adicionar uma regra no `vercel.json` para que a nova página possa ser acessada através de uma URL.

Por exemplo:

```json
{
    "source": "/novaCategoria.php",
    "destination": "/api/novaCategoria.php"
}
```

Também é necessário adicionar a página ao array `$menu` presente em:

```text
include/header.php
```

Por exemplo:

```php
"Nova Categoria" => "/novaCategoria.php"
```

---

## Executando o projeto localmente

Como o projeto utiliza PHP, os arquivos não devem ser executados apenas abrindo o arquivo `.php` diretamente pelo navegador.

É necessário utilizar um servidor com suporte a PHP.

### Utilizando XAMPP

Coloque o projeto dentro da pasta do servidor Apache.

No Linux, normalmente:

```text
/opt/lampp/htdocs/
```

No Windows, normalmente:

```text
C:\xampp\htdocs\
```

Por exemplo:

```text
C:\xampp\htdocs\modelo-site\
```

Inicie o Apache pelo XAMPP.

Depois acesse:

```text
http://localhost/modelo-site/
```

### Acessando as páginas durante o desenvolvimento local

Como os arquivos principais estão dentro da pasta `api`, também é possível acessá-los diretamente:

```text
http://localhost/modelo-site/api/index.php
```

```text
http://localhost/modelo-site/api/marketing.php
```

```text
http://localhost/modelo-site/api/noticia.php?artigo=Teste
```

O arquivo `vercel.json` é utilizado pela Vercel e não é interpretado pelo Apache/XAMPP.

Por isso, os `rewrites` utilizados no deploy não possuem o mesmo comportamento durante a execução local.

---

## Deploy

O projeto está configurado para realizar deploy na Vercel.

A configuração está presente no arquivo:

```text
vercel.json
```

A Vercel identifica os arquivos PHP dentro da pasta `api/` como funções e utiliza o runtime PHP configurado no projeto.

Após enviar as alterações para o repositório Git:

```bash
git add .
git commit -m "Atualiza projeto"
git push
```

a Vercel pode realizar automaticamente um novo deploy, dependendo da configuração do repositório conectado.

---

## Organização

A arquitetura do projeto segue uma separação simples:

```text
Páginas PHP
     ↓
api/
     ↓
Componentes reutilizáveis
     ↓
header / footer / aside / article / cardsArticle
     ↓
Estilização e arquivos estáticos
     ↓
assets/
```

Essa organização reduz a duplicação de código e facilita alterações globais.

Por exemplo, uma alteração realizada em:

```text
include/header.php
```

será refletida nas páginas que utilizam esse componente.

---

## Estado atual

O projeto possui uma estrutura funcional para criação de páginas de conteúdo utilizando PHP.

Atualmente, o projeto possui:

- página inicial;
- página de Marketing;
- página individual de notícias;
- componentes PHP reutilizáveis;
- cards de artigos;
- cabeçalho com menu dinâmico;
- barra lateral;
- rodapé;
- estilização utilizando CSS;
- execução local através do XAMPP/Apache;
- configuração para execução e deploy na Vercel.