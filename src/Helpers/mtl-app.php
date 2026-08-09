<?php

use Metal\MTL\App;

/*
|--------------------------------------------------------------------------
| Metal App helpers — 1:1 over ext-metal (Metal\MTL\App)
|--------------------------------------------------------------------------
| Helper names match the C ABI (mtl_app_*). Opaque ints pass through.
*/

if (! function_exists('mtl_app_init')) {
    function mtl_app_init(): bool
    {
        return App::init();
    }
}

if (! function_exists('mtl_app_poll')) {
    function mtl_app_poll(): bool
    {
        return App::poll();
    }
}

if (! function_exists('mtl_app_run')) {
    function mtl_app_run(): void
    {
        App::run();
    }
}

if (! function_exists('mtl_app_terminate')) {
    function mtl_app_terminate(): void
    {
        App::terminate();
    }
}

if (! function_exists('mtl_app_should_quit')) {
    function mtl_app_should_quit(): bool
    {
        return App::shouldQuit();
    }
}

if (! function_exists('mtl_app_reset_quit')) {
    function mtl_app_reset_quit(): void
    {
        App::resetQuit();
    }
}
