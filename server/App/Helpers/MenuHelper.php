<?php


namespace Helpers;

class MenuHelper
{

    public static function prepareMenuGenero($menuGroup)
    {
        $generoMenu = [];
        foreach ($menuGroup as $genero) {
            if (strpos($genero["Genero"], ",") > 0) {
                $explode = explode(",", $genero["Genero"]);
                for ($i = 0; $i < sizeof($explode); $i++) {
                    $generoMenu[] = trim($explode[$i]);
                }
            } else {
                if ($genero["Genero"] != "")
                    $generoMenu[] = trim($genero["Genero"]);
            }
        }
        
        return array_unique($generoMenu);
    }

    public static function prepareLink($param, $menu)
    {
        return $_ENV["URL_PUBLIC"] . $param . strtolower($menu);
    }
}
