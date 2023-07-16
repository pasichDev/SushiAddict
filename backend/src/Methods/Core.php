<?php

namespace App\Methods;

use App\Model\ParramLink;

final class Core
{
    static function decoderLink($link)
    {
        parse_str($link, $result);
        return new ParramLink($result['key_api'], $result['action']);
    }
}
