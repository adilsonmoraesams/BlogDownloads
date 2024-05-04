<?php

use Helpers\ParticularHelpers;
?>
<div class="row justify-content-md-center">

    <div class="row">
        <div class="col-12">
            <a href="/"><i class="bi bi-arrow-return-left"></i> Voltar</a>
            <h1 itemprop="headline"><?= $data["filme"]["Titulo"] ?></h1>
            <a href="https://semtorrent.com/filme/a-viagem-de-pedro-nacional/#links" title="Data de Publicação">
            </a>
        </div>
        <p class="py-2"></p>
        <div class="col-3">
            <img class="rounded img-fluid" src="data:image/jpeg;base64,<?= $data["filme"]["ImagemCapa"] ?>" a lt="A Viagem de Pedro - Nacional Nacional" title="A Viagem de Pedro - Nacional Nacional">
        </div>
        <div class="col-8">
            <p>
                <strong>Baixar <?= $data["filme"]["Titulo"] ?> - Torrent</strong><br>
                <strong>Lançamento:</strong> <?= $data["filme"]["AnoLancamento"] ?><br>
                <strong>Gênero:</strong> <?= ParticularHelpers::LinkGenero( $data["filme"]["Genero"] ) ?><br>
                <strong>Idioma: </strong><?= $data["filme"]["Idioma"] ?><br>
                <strong>Duração: </strong><?= $data["filme"]["Duracao"] ?> <br>
                <strong>Classificação: </strong><?= $data["filme"]["Classificacao"] ?><br>
                <strong>Qualidade: </strong><?= $data["filme"]["Qualidade"] ?> <br>
                <strong>Vídeo: </strong><?= $data["filme"]["Video"] ?> / <strong>Áudio</strong>: <?= $data["filme"]["Audio"] ?><br>
                <strong>Duração: </strong> <?= $data["filme"]["Duracao"] ?><br>
                <strong>Nota da Crítica: </strong> <?= $data["filme"]["Imdb"] ?><br>
                <strong>Categoria: </strong><a href="/?categoria=<?= $data["filme"]["Categoria"] ?>"><?= $data["filme"]["Categoria"] ?></a><br>
            </p>
        </div>
    </div>
    <div class="row">
        <p>
        <div id="sinopse" class="my">
            <p>
                <strong>Sinopse</strong>: <?= $data["filme"]["Sinopse"] ?>
            </p>
        </div>
        <strong>Trailer</strong>


        <iframe class="embed-responsive-item" title="A Viagem de Pedro - Nacional" src="<?= $data["filme"]["Trailler"] ?>"></iframe>

        <h1 id="lista_download" class="botao_dublado mt-4"><?= $data["filme"]["Titulo"] ?></h1>

        <p class="text-center">
            <time datetime="<?= $data["filme"]["DataPublicacao"] ?>" itemprop="dateModified"><strong></strong></time>
        </p>
        <div class="w-100 text-center">
            <pre style="font-family: Roboto; letter-spacing: 0.1rem; line-height: 2.5;"><?= $data["filme"]["Elenco"] ?></pre>
        </div>
    </div>
    </p>



    <?php if (sizeof($data["links"]) > 0) { ?>


        <div class="row">
            <table class="table">
                <tbody>
                    <?php foreach ($data["links"] as $link) { ?>
                        <tr>
                            <td><?= $link["Titulo"] ?></td>
                            <td><?= $link["Idioma"] ?></td>
                            <td><?= $link["Qualidade"] ?></td>
                            <td><?= $link["Tamanho"] ?></td>
                            <td><a href="<?= $link["Url"] ?>" class="btn btn-primary">Baixar</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php } ?>

</div>

</div>