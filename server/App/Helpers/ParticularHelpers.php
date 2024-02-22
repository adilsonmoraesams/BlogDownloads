<?php

namespace Helpers;

class ParticularHelpers{


    public static function LinkGenero($var)
    {
        $explode = explode(",", $var);
        $html = [];
        foreach($explode as $item)
        {
            $html[] = "<a href='/?genero={$item}' >{$item}<a/>";
        }

        return implode(", ", $html);
    }

}