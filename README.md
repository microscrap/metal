# microscrap/metal — macOS Metal + AppKit helpers for ScrapyardIO

[![Docs](https://img.shields.io/badge/docs-ScrapyardIO-0ea5e9)](https://scrapyard-io.projectsaturnstudios.com/ecosystem/microscrap/metal/0.7.x/overview)
[![CI](https://github.com/microscrap/metal/actions/workflows/tests.yml/badge.svg?branch=0.7.x)](https://github.com/microscrap/metal/actions/workflows/tests.yml)
[![Packagist](https://img.shields.io/packagist/v/microscrap/metal.svg?label=packagist)](https://packagist.org/packages/microscrap/metal)
[![PHP](https://img.shields.io/badge/php-%5E8.4%7C%5E8.5%7C%5E8.6-777bb4?logo=php&logoColor=white)](https://www.php.net)
[![Platform](https://img.shields.io/badge/platform-macOS-lightgrey)](https://developer.apple.com/metal/)
[![ext-metal](https://img.shields.io/badge/ext--metal-%5E0.7.3-black)](https://github.com/php-io-extensions/metal)
[![Pest](https://img.shields.io/badge/tests-Pest-54b4c0)](https://pestphp.com)
[![OKF](https://img.shields.io/badge/knowledge-OKF-8b5cf6)](.okf/index.md)
[![License: MIT](https://img.shields.io/badge/license-MIT-green)](LICENSE)

**Docs:** [ScrapyardIO — microscrap/metal `0.7.x`](https://scrapyard-io.projectsaturnstudios.com/ecosystem/microscrap/metal/0.7.x/overview)

PHP helper library that wraps the [**metal** extension](https://github.com/php-io-extensions/metal) with global functions. Each helper delegates to `Metal\MTL\{App,Window,Menu,Device,Texture,Input}`.

This is a **1:1 bindings** package (posix / ftdi / cuda style). Opaque handles stay as `int` (`0` = failure / none). Tubes framebuffer registration belongs in **`microscrap/metal-gfx`** (separate).

## Highlights

* C ABI helper names matching the extension bridge (`mtl_app_init`, `mtl_window_create`, `mtl_texture_create_rgba8`, `mtl_input_key_down`, …)
* Covers App lifecycle, NSWindow + CAMetalLayer clear/present, menu bar, MTLDevice / command queues, **offscreen MTLTexture** (0.7.1+), and **Input** keyboard/mouse/gamepad (0.7.3+)
* No exceptions in `src/` — check bool/int returns (`0` / `false` on failure)
* Coverage drift guard against the frozen ext-metal `0.7.3` surface

## Requirements

* PHP 8.4+
* **macOS** + **ext-metal** ^0.7.3 — install via [PHP PIE](https://github.com/php/pie):

```bash
pie install php-io-extensions/metal:0.7.x-dev --make-parallel-jobs=1
```

## Installation

```bash
php -m | grep metal
composer require microscrap/metal:^0.7.3
```

Composer autoloads `src/Helpers/mtl-*.php`.

## Usage

```php
<?php

mtl_app_init();
mtl_menu_install_default('Metal Demo');

$device = mtl_device_create_system_default();
$window = mtl_window_create('hello', 640, 480);
mtl_window_attach_device($window, $device);
mtl_window_show($window);

while (mtl_app_poll()) {
    mtl_window_clear($window, 32, 64, 128, 255); // RGBA 0..255
    if (mtl_window_should_close($window)) {
        break;
    }
}

mtl_window_destroy($window);
mtl_device_release($device);
mtl_app_terminate();
```

`mtl_window_clear` / `mtl_texture_clear` take integer RGBA **0..255**.

### Offscreen texture (0.7.1+)

```php
$device = mtl_device_create_system_default();
$queue = mtl_device_new_command_queue($device);
$tex = mtl_texture_create_rgba8($device, 320, 200);
mtl_texture_clear($tex, $queue, 32, 64, 128, 255);
$bytes = mtl_texture_read_rgba8($tex, $queue);
mtl_texture_release($tex);
mtl_command_queue_release($queue);
mtl_device_release($device);
```

### Input (0.7.3+)

```php
use Microscrap\Bindings\Metal\Enums\KeyCode;
use Microscrap\Bindings\Metal\Enums\MouseButton;

while (mtl_app_poll()) {
    if (mtl_input_key_down(KeyCode::W)) {
        // ...
    }
    if (mtl_input_mouse_button_down(MouseButton::LEFT)) {
        [$x, $y] = mtl_input_mouse_position($window); // content-view, Y up
    }
    echo mtl_input_gamepad_count();
}
```

## Helper map

| Helpers | Extension |
|---------|-----------|
| `mtl_app_*` | `Metal\MTL\App` |
| `mtl_window_*` | `Metal\MTL\Window` |
| `mtl_menu_*` | `Metal\MTL\Menu` |
| `mtl_device_*` / `mtl_command_queue_release` | `Metal\MTL\Device` |
| `mtl_texture_*` | `Metal\MTL\Texture` |
| `mtl_input_*` | `Metal\MTL\Input` |

## License

MIT © Angel Gonzalez
