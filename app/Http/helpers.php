<?php

use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

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

if (!function_exists('prepareHTMLInput')) {
    function prepareHTMLInput(string $html): string
    {
        $dom = new \DOMDocument();
        $dom->loadHtml($html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $img) {
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data) = explode(',', $data);
            $data = base64_decode($data);

            $imageName = Storage::putFile('photos', new File($data));

            $img->removeAttribute('src');
            $img->setAttribute('src', asset($imageName));
        }

        $html = $dom->saveHTML();
        return $html;
    }
}
