<?php

function web_url($asset, $is_bower = false)
{
    $path = base_url() . 'web/';

    if($is_bower)
    {
        $path .= 'bower_components/';
    }

    $path .= $asset;

    return $path;
}