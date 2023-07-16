<?php

namespace App\Methods;

use App\Model\ParramLink;

final class Core
{
    static function decoderLink($link)
    {
        $data = explode('&', $link);
        return new ParramLink(explode("=", $data[0])[1], explode("=", $data[1])[1]);
    }
}
