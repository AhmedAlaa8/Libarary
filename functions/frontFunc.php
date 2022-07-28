<?php


function adminLTE(string $path)
{
    return "./public/assets/adminLTE/$path";
}

function layouts(string $path)
{
    return ROOT . "./public/admin/layouts/$path";
}

function sitelayouts(string $path)
{
    return ROOT . "./public/site/layouts/$path";
}

function admin(string $path)

{
    return "./public/admin/layouts/$path";
}

function Website(string $path)

{
    return "/public/assets/site/$path";
}
