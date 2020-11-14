<?php

if (!function_exists('image')) {
    function image($path)
    {
        return $path ? asset('storage/' . $path) : asset('storage/' . setting('site.default-image'));
    }
}
