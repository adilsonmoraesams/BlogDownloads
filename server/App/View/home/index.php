<div class="row justify-content-center align-items-center">



    <?php

    use Helpers\PaginationHelper;
    use System\BaseApi\Request;

    foreach ($data["filmes"]["result"] as $item) { ?>
        <div class="card m-2 p-2" style="width: 15rem;">
            <a href="/filme/<?= $item["id"] ?>">
                <img src="data:image/jpeg;base64,<?= $item["ImagemCapa"] ?>" class="img-fluid" alt="<?= $item["Titulo"] ?>">
            </a>
            <div class="card-body text-center">
                <h5 style="font-size: 16px; height: 60px; text-align: center" class="card-title">
                    <a href="/filme/<?= $item["id"] ?>">
                        <?= $item["Titulo"] ?>
                    </a>
                    <br />
                    <span style="font-size: 12px;"><strong>IMDB <?= $item["Imdb"] ?></strong></span>
                </h5>
            </div>
        </div>
    <?php } ?>


    <?=
    PaginationHelper::PaginationBootstrap(
        $data["filmes"],
        "&ano=" . Request::get("ano") . "&genero=" . Request::get("genero") . "&categoria=" . Request::get("categoria")
    );
    ?>

</div>