<?php


namespace Controller;

use App\Data\ClienteRepository;
use App\Data\FilmeRepository;
use App\Data\LinkDownloadRepository;
use App\Models\Cliente;
use Exception;
use System\BaseView\EnumRequestTipo;
use System\BaseView\EnumRequestValidacao;
use System\BaseView\Request;
use System\BaseView\Response;
use System\Logs;


class FilmeController extends Request
{
    protected $FilmeRepository;
    protected $LinkDownloadRepository;
    protected $request;
    public $skip_filmes = 8;

    public function __construct()
    {
        $this->FilmeRepository = new FilmeRepository();
        $this->LinkDownloadRepository = new LinkDownloadRepository();
        $this->request = new Request();
    }


    /*
     * Index 
    */
    public function Index($id)
    { 
        $filme = $this->FilmeRepository->getByIdFilmes($id); 
        $links = $this->LinkDownloadRepository->getLinksByFilme($id);
 
        Response::View(
            "filme/index",
            array(
                "filme" => $filme,
                "links" => $links
            )
        );
    }
}
