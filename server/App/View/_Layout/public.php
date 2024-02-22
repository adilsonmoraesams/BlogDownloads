<?php

use App\Data\FilmeRepository;
use Helpers\MenuHelper;

// Ano de lançamento
$FilmeRepository = new FilmeRepository();
$anoLancamento = $FilmeRepository->getAnoLancamentoGroup();

// Menu genero
$generoGroup = $FilmeRepository->getGeneroGroup();
$MenuGenero = MenuHelper::prepareMenuGenero($generoGroup);
sort($MenuGenero);

?>
<!doctype html>
<html lang="pt-br" data-bs-theme="auto">

<head>
    <script src="<?= $_ENV["URL_PUBLIC"] ?>/assets/bootstrap-5.3/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Filmes e Séries - Baixe os melhores filmes e séries com as melhores qualidades da internet">
    <meta name='robots' content='index,follow' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0, minimum-scale=1.0' />
    <meta name="generator" content="Hugo 0.118.2">
    <title>NO Torrents - filmes séries <?= isset($_SESSION["title"]) ? $_SESSION["title"] : "" ?></title>
    <meta name='country' content='Brazil' />
    <!-- <meta property='og:url' content='https://notorrent.com.br/' /> -->
    <meta property='og:title' content='Baixar Filmes e Séries Torrent | Lançamentos 10' />
    <meta property='og:description' content='Filmes e Séries - Baixe os melhores filmes e séries com as melhores qualidades da internet' />
    <meta property='article:publisher' content='https://notorrent.com.br/' />
    <meta property='og:site_name' content='NO Torrent - Filmes Dublados' />
    <meta property='article:section' content='Download' />
    <meta property='og:locale' content='pt_BR' />
    <meta itemprop='name' content='Baixar Filmes e Séries Torrent | Lançamentos 10' />
    <meta itemprop='description' content='Filmes e Séries - Baixe os melhores filmes e séries com as melhores qualidades da internet' />
    <meta itemprop='image' content='https://notorrent.com.br/torrentoon.webp' />
    <meta name='twitter:card' content='summary' />
    <meta name='twitter:description' content='Filmes e Séries - Baixe os melhores filmes e séries com as melhores qualidades da internet' />
    <meta name='twitter:title' content='Baixar Filmes e Séries Torrent | Lançamentos 10' />
    <meta name='AUTHOR' content='NO Torrent' />
    <meta name='DISTRIBUTION' content='GLOBAL' />
    <meta content='pt-BR' name='LANGUAGE' />
    <meta content='pt-br' http-equiv='Content-Language' />
    <meta name='twitter:image' content='https://notorrent.com.br/torrentoon.webp' />
    <meta name='theme-color' content='#fff'>
    <meta property='og:image:secure_url' content='https://notorrent.com.br/torrentoon.webp' />

    <meta property='og:type' content='website'>
    <meta property='og:image:width' content='256'>
    <meta property='og:image:height' content='256'>
    <!-- <base href='https://notorrent.com/' /> -->


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="<?= $_ENV["URL_PUBLIC"] ?>/assets/bootstrap-5.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,700;1,300;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom styles for this template -->
    <link href="<?= $_ENV["URL_PUBLIC"] ?>/assets/public.css" rel="stylesheet">
</head>

<body>
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check2" viewBox="0 0 16 16">
            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
        </symbol>
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
            <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
        </symbol>
    </svg>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
            <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
                <use href="#circle-half"></use>
            </svg>
            <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#sun-fill"></use>
                    </svg>
                    Light
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#moon-stars-fill"></use>
                    </svg>
                    Dark
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#circle-half"></use>
                    </svg>
                    Auto
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
        </ul>
    </div>


    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="aperture" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="10" />
            <path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94" />
        </symbol>
        <symbol id="cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
        <symbol id="chevron-right" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
        </symbol>
    </svg>

    <div class="container">
        <header class="border-bottom lh-1 py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-4 pt-1">
                    <a class="navbar-brand" href="<?= $_ENV["URL_PUBLIC"] ?>">NO Torrents</a>
                </div>
                <div class="col-4 text-center">
                    <a class="blog-header-logo text-body-emphasis text-decoration-none" href="#"></a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <!-- <a class="link-secondary" href="#" aria-label="Search">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24">
                            <title>Search</title>
                            <circle cx="10.5" cy="10.5" r="7.5" />
                            <path d="M21 21l-5.2-5.2" />
                        </svg>
                    </a>
                    <a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a> -->
                </div>
            </div>
        </header>

        <div class="py-1 mb-3 border-bottom">
            <nav class="nav nav-underline ">
                <a class="nav-item nav-link link-body-emphasis active" href="<?= $_ENV["URL_PUBLIC"] ?>/?categoria=Filme">Filmes</a>
                <a class="nav-item nav-link link-body-emphasis" href="<?= $_ENV["URL_PUBLIC"] ?>/?categoria=Serie">Séries</a>
                <a class="nav-item nav-link link-body-emphasis" href="<?= $_ENV["URL_PUBLIC"] ?>/?categoria=desenho">Animes</a>

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Ano Lançamento
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <?php foreach ($anoLancamento as $Lancamento) { ?>
                                <li>
                                    <a class="dropdown-item" href="<?= $_ENV["URL_PUBLIC"] ?>/?ano=<?= $Lancamento["AnoLancamento"] ?>">
                                        <?= $Lancamento["AnoLancamento"] ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <button class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Gênero
                        </button>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <?php foreach ($MenuGenero as $menu) { ?>
                                <li><a class="dropdown-item" href="<?= MenuHelper::prepareLink("/?genero=", $menu) ?>"><?= $menu ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>

                <!-- <a class="nav-item nav-link link-body-emphasis" href="#">Culture</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Business</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Politics</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Opinion</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Science</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Health</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Style</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Travel</a> -->
            </nav>
        </div>
    </div>

    <main class="container">

        <?php require($view); ?>





    </main>


    <footer class="py-5 text-center text-body-secondary bg-body-tertiary">
        <div class="container text-justify">
            Aviso: Não hospedamos nem armazenamos nenhum tipo de mídia áudio visual em nossos servidores, o site é atualizado por seus usuários e por um script de computador automatizado, se encontrar algum conteúdo protegido por direitos autorais nos avise.
        </div>

        <p>
            NO Torrent - Copyright © <?= date("Y") ?> - Filmes e Séries Dublados. Parcerias: Sem Torrent, Filmes Torrent, Séries Torrent e Filmes e Séries Dubladas Torrent
        </p>

        <p class="mb-0">
            <a href="#">Voltar ao topo</a>
        </p>
    </footer>

    <script src="<?= $_ENV["URL_PUBLIC"] ?>/assets/bootstrap-5.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>