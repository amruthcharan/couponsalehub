<?php

if (!function_exists('image')) {
    function image($path)
    {
        return $path ? asset('storage/' . $path) : asset('storage/' . setting('site.default-image'));
    }
}
if (!function_exists('thumbnail')) {
    function thumbnail($image, $name)
    {
        return str_replace('.jpg', '', $image) . '-' . $name . '.jpg';
    }
}
