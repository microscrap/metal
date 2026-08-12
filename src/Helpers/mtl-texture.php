<?php

use Metal\MTL\Texture;

/*
|--------------------------------------------------------------------------
| Metal Texture helpers — 1:1 over ext-metal 0.7.1 (Metal\MTL\Texture)
|--------------------------------------------------------------------------
| Offscreen RGBA8Unorm textures for headless engines / UIs / metal-gfx.
*/

if (! function_exists('mtl_texture_create_rgba8')) {
    function mtl_texture_create_rgba8(int $device, int $width, int $height): int
    {
        return Texture::create($device, $width, $height);
    }
}

if (! function_exists('mtl_texture_release')) {
    function mtl_texture_release(int $texture): void
    {
        Texture::release($texture);
    }
}

if (! function_exists('mtl_texture_get_width')) {
    function mtl_texture_get_width(int $texture): int
    {
        return Texture::getWidth($texture);
    }
}

if (! function_exists('mtl_texture_get_height')) {
    function mtl_texture_get_height(int $texture): int
    {
        return Texture::getHeight($texture);
    }
}

if (! function_exists('mtl_texture_clear')) {
    function mtl_texture_clear(int $texture, int $queue, int $r, int $g, int $b, int $a = 255): bool
    {
        return Texture::clear($texture, $queue, $r, $g, $b, $a);
    }
}

if (! function_exists('mtl_texture_write_pixel')) {
    function mtl_texture_write_pixel(int $texture, int $x, int $y, int $r, int $g, int $b, int $a = 255): bool
    {
        return Texture::writePixel($texture, $x, $y, $r, $g, $b, $a);
    }
}

if (! function_exists('mtl_texture_fill_rect')) {
    /**
     * Solid-color rect fill via one Texture::fillRect (ext-metal ≥ 0.7.4).
     */
    function mtl_texture_fill_rect(
        int $texture,
        int $x,
        int $y,
        int $width,
        int $height,
        int $r,
        int $g,
        int $b,
        int $a = 255,
    ): bool {
        return Texture::fillRect($texture, $x, $y, $width, $height, $r, $g, $b, $a);
    }
}

if (! function_exists('mtl_texture_read_pixel')) {
    /**
     * @return array<int, int>
     */
    function mtl_texture_read_pixel(int $texture, int $queue, int $x, int $y): array
    {
        return Texture::readPixel($texture, $queue, $x, $y);
    }
}

if (! function_exists('mtl_texture_read_rgba8')) {
    function mtl_texture_read_rgba8(int $texture, int $queue): string
    {
        return Texture::readPixels($texture, $queue);
    }
}
