<?php

if (!function_exists('requestUri')) {
    function requestUri(): string
    {
        $route = \Route::current()->uri;
        return strpos($route, '/') ? strstr($route, '/', true) : $route;
    }
}

if (!function_exists('buildRoutes')) {
    function buildRoutes(string $url, array $extentions)
    {
        $singular = str_singular($url);
        $controller = ucfirst($url) . 'Controller';
        foreach ($extentions as $extention) {
            Route::post("$url/{{$singular}}/$extention", "$controller@$extention")->name("$url.$extention");
        }
    }
}


