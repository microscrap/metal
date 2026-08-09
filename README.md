# microscrap/metal — macOS Metal + AppKit helpers for ScrapyardIO

PHP helper library that wraps the [**metal** extension](https://github.com/php-io-extensions/metal) with global functions. Each helper delegates to `Metal\MTL\{App,Window,Menu,Device}`.

This is a **1:1 bindings** package (posix / ftdi / cuda style). Opaque handles stay as `int` (`0` = failure / none). Tubes framebuffer registration belongs in **`microscrap/metal-gfx`** (separate).

## Highlights

* C ABI helper names matching the extension bridge (`mtl_app_init`, `mtl_window_create`, …)
* Covers App lifecycle, NSWindow + CAMetalLayer clear/present, menu bar, MTLDevice / command queues
* No exceptions in `src/` — check bool/int returns (`0` / `false` on failure)
* Coverage drift guard against the frozen ext-metal `0.7.0` surface

## Requirements

* PHP 8.4+
* **macOS** + **ext-metal** ^0.7.0 — install via [PHP PIE](https://github.com/php/pie):

```bash
pie install php-io-extensions/metal:0.7.x-dev --make-parallel-jobs=1
```

## Installation

```bash
php -m | grep metal
composer require microscrap/metal
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
    mtl_window_clear($window, 32, 64, 128, 255);
    if (mtl_window_should_close($window)) {
        break;
    }
}

mtl_window_destroy($window);
mtl_device_release($device);
mtl_app_terminate();
```

`mtl_window_clear` takes integer RGBA **0..255** (same as `Metal\MTL\Window::clear`).

## Helper map

| Helpers | Extension |
|---------|-----------|
| `mtl_app_*` | `Metal\MTL\App` |
| `mtl_window_*` | `Metal\MTL\Window` |
| `mtl_menu_*` | `Metal\MTL\Menu` |
| `mtl_device_*` / `mtl_command_queue_release` | `Metal\MTL\Device` |

## License

MIT © Angel Gonzalez
