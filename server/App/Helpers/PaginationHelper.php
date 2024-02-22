<?php

namespace Helpers;

use System\BaseApi\Request;

class PaginationHelper
{

    public static function Paginate($pagination, $count)
    {
        $pagination["count"] = $count;
        $pagination["count_pages"] = round($count / $pagination["skip"]);

        return $pagination;
    }

    public static function PaginationBootstrap($data, $filter)
    {
        $html = "
        <nav>        
            <span>Total de registros: " . $data["pagination"]["count"] . "</span> <span>de " . $data["pagination"]["count_pages"] . " páginas</span>
            <ul class=\"pagination justify-content-center\">
                <li class=\"page-item " . ($data["pagination"]["page"] == 1 ? "disabled" : "") . " \" >
                    <a href=\"?page=1&" . $filter . "\" class=\"page-link\">Primeiro</a>
                </li>";

        for ($i = 1; $i <= $data["pagination"]["count_pages"]; $i++) {

            if (
                $i >= ($data["pagination"]["page"] - 2) && $i <= ($data["pagination"]["page"] + 2)
            ) {
                $html .= "<li class=\"page-item " . ($i == $data["pagination"]["page"] ? "active" : "") .  " \" >";
                $html .= "<a class=\"page-link\" href=\"?page=" . $i . $filter . " \">" . $i . "</a>";
                $html .= "</li>";
            }
        }

        $html .= "<li class=\"page-item " . ($data["pagination"]["page"] == $data["pagination"]["count_pages"] ? "disabled" : "") . " \" >";
        $html .= "<a href=\"?page=" . $data["pagination"]["count_pages"] . "&" . $filter . "\" class=\"page-link\">Último</a>";
        $html .= "</li>
            </ul>
        </nav>";

        return $html;
    }


    public static function get($skip)
    {
        $page = Request::get("page");
        if ($page == "") {
            $page = 1;
        }

        $pagination = [
            "page" => $page,
            "skip" => $skip
        ];

        return $pagination;
    }
}
