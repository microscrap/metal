<?php

use Metal\MTL\Window;

/*
|--------------------------------------------------------------------------
| Metal Window helpers — 1:1 over ext-metal (Metal\MTL\Window)
|--------------------------------------------------------------------------
| Helper names match the C ABI (mtl_window_*). Opaque window/device ints.
| Window::clear uses integer RGBA 0..255 (same as the PHP extension).
*/

if (! function_exists('mtl_window_create')) {
    function mtl_window_create(string $title, int $width, int $height): int
    {
        return Window::create($title, $width, $height);
    }
}

if (! function_exists('mtl_window_destroy')) {
    function mtl_window_destroy(int $window): void
    {
        Window::destroy($window);
    }
}

if (! function_exists('mtl_window_set_title')) {
    function mtl_window_set_title(int $window, string $title): void
    {
        Window::setTitle($window, $title);
    }
}

if (! function_exists('mtl_window_show')) {
    function mtl_window_show(int $window): void
    {
        Window::show($window);
    }
}

if (! function_exists('mtl_window_hide')) {
    function mtl_window_hide(int $window): void
    {
        Window::hide($window);
    }
}

if (! function_exists('mtl_window_should_close')) {
    function mtl_window_should_close(int $window): bool
    {
        return Window::shouldClose($window);
    }
}

if (! function_exists('mtl_window_get_width')) {
    function mtl_window_get_width(int $window): int
    {
        return Window::getWidth($window);
    }
}

if (! function_exists('mtl_window_get_height')) {
    function mtl_window_get_height(int $window): int
    {
        return Window::getHeight($window);
    }
}

if (! function_exists('mtl_window_attach_device')) {
    function mtl_window_attach_device(int $window, int $device): bool
    {
        return Window::attachDevice($window, $device);
    }
}

if (! function_exists('mtl_window_get_layer')) {
    function mtl_window_get_layer(int $window): int
    {
        return Window::getLayer($window);
    }
}

if (! function_exists('mtl_window_clear')) {
    function mtl_window_clear(int $window, int $r, int $g, int $b, int $a = 255): bool
    {
        return Window::clear($window, $r, $g, $b, $a);
    }
}

if (! function_exists('mtl_window_get_device')) {
    function mtl_window_get_device(int $window): int
    {
        return Window::getDevice($window);
    }
}

if (! function_exists('mtl_window_present_texture')) {
    function mtl_window_present_texture(int $window, int $texture): bool
    {
        return Window::presentTexture($window, $texture);
    }
}
