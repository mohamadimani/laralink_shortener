<?php

use App\Models\V1\ShortLink;
use App\Services\ResponseService;

if (!function_exists('apiResponse')) {
    /**
     * api response
     *
     * @return ResponseService
     */
    function apiResponse(): ResponseService
    {
        return app('response');
    }
}

function makeShortLink($length = 5)
{
    $link = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";

    for ($i = 0; $i < $length; $i++) {
        $link .= $codeAlphabet[mt_rand(0, strlen($codeAlphabet) - 1)];
    }
    if (ShortLink::where('short_link', $link)->first()) {
        makeShortLink($length);
    }
    return $link;
}
