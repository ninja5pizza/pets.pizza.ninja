<?php

if (! function_exists('cdn_asset')) {
    function cdn_asset(string $path): string
    {
        $cdnUrl = config('app.cdn_url');

        $path = '/'.ltrim($path, '/');

        return $cdnUrl.$path;
    }
}
