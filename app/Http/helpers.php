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

if (!function_exists('prepareHTMLInput')) {
    function prepareHTMLInput(string $html): string
    {
        $dom = new \DOMDocument();
        $dom->loadHtml(
            mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'),
            LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
        );
        $images = $dom->getElementsByTagName('img');

        foreach ($images as $k => $img) {
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            $extention = substr(strrchr($type, '/'), 1); //For Ex. data:image/svg+xml => svg+xml, data:image/png => png
            if (strpos($extention, '+')) {
                $extention = strstr($extention, '+', true); //For Ex. svg+xml => svg
            }
            list(, $data) = explode(',', $data);
            $data = base64_decode($data);
            $imageName = time() . $k . '.' . $extention;
            $path = storage_path('app/public/contents/') . $imageName;
            file_put_contents($path, $data);
            $img->removeAttribute('src');
            $img->setAttribute('src', asset('storage/contents/' . $imageName));
        }

        $html = $dom->saveHTML();
        return $html;
    }
}

if (!function_exists('getExcerpt')) {
    function getExcerpt(string $html)
    {
        $text = strip_tags($html);
        $excerpt = mb_substr($text, 0, 1500);
        $excerpt = substr($excerpt, 0, strrpos($excerpt, '&')) . '..';
        return $excerpt;
    }
}

if (!function_exists('imageUrl')) {
    function imageUrl($image)
    {
        return asset($image ? ('storage/' . $image) : 'images/default.png');
    }
}
