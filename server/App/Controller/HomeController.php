<?php


namespace Controller;

use App\Data\ClienteRepository;
use App\Data\FilmeRepository;
use App\Models\Cliente;
use Exception;
use Helpers\PaginationHelper;
use System\BaseView\EnumRequestTipo;
use System\BaseView\EnumRequestValidacao;
use System\BaseView\Request;
use System\BaseView\Response;
use System\Logs;


class HomeController extends Request
{
    protected $FilmeRepository;
    protected $request;
    public $skip_filmes = 10;

    public function __construct()
    {
        $this->FilmeRepository = new FilmeRepository();
        $this->request = new Request();
    }


    /*
     * Index 
    */
    public function Index()
    {
        $categoria = parent::get("categoria");
        $ano = parent::get("ano");
        $genero = parent::get("genero");

        $pagination = PaginationHelper::get(10);
        $filmes = $this->FilmeRepository->getFilmes($pagination, $ano, $genero, $categoria);

        Response::View(
            "home/index",
            array(
                "filmes" => $filmes
            )
        );
        
    }

    
}
