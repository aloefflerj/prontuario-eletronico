<?php

function site(string $param = null): string
{
    
    if ($param && !empty(SITE[$param])){
        return SITE[$param];
    }
 
 
    return SITE["root"];
}
 
function asset(string $path): string
{
    return SITE["root"] . "/views/assets/{$path}";
}
 
function css(string $path): string
{
    return asset("css/{$path}");
}
 
function files(string $path): string
{
    return asset("files/{$path}");
}
 
function img(string $path): string
{
    return asset("img/{$path}");
}
 
function js(string $path): string
{
    return asset("js/{$path}");
}
 
function views(string $path): string
{
    return asset("views/{$path}");
}
 
function flash(string $type = null, string $message = null): string
{
    if ($type && $message){
        $_SESSION["flash"] = [
            "type" => $type,
            "message" => $message
        ];
    }
 
    if(!empty($_SESSION["flash"]) && $flash = $_SESSION["flash"]){
        unset($_SESSION["flash"]);
        return "<div class=\"message {$flash["type"]}\">{$flash["message"]}</div>";
    }
 
    
}
 
 
function url(string $uri = null): string
{
    if($uri){
        return site() . "/{$uri}";
    }
 
    return site();
}
