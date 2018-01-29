<?php

if (!function_exists('requestUri')) {
    function requestUri(): string
    {
        $prefix = Route::current() ? Route::current()->getPrefix() : null;
        $route = str_replace(ltrim($prefix . '/', '/'), '', Route::current()->uri ?? '');
        return strpos($route, '/') ? strstr($route, '/', true) : $route;
    }
}

if (!function_exists('buildRoutes')) {
    function buildRoutes(string $url, array $extentions, $controller = null)
    {
        $singular = str_singular($url);
        $controller = $controller ?? ucfirst($url) . 'Controller';
        foreach ($extentions as $extention) {
            Route::post("$url/{{$singular}}/$extention", "$controller@$extention")->name("$url.$extention");
        }
    }
}


