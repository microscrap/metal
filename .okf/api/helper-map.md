---
type: APIMap
title: Helper map (mtl_*)
description: App / Window / Menu / Device helpers mapped to Metal\MTL\* methods
tags: [metal, microscrap, api, helpers]
resource: ../tests/Support/HelperNames.php
status: draft
generated: { by: okf-documentation-generator/cursor, at: 2026-08-09T02:19:38Z }
sources:
  - id: helper-names
    resource: ../tests/Support/HelperNames.php
    title: HelperNames map
  - id: frozen
    resource: ../tests/Support/extension-methods-0.7.0.php
    title: Frozen ext-metal 0.7.0 surface
  - id: readme
    resource: ../README.md
    title: Package README
---

# Surface (ext-metal 0.7.0)

Frozen method list lives in `tests/Support/extension-methods-0.7.0.php`. C ABI names are enforced by `HelperNames` + `CoverageTest`.[^frozen][^helper-names]

## App — `Metal\MTL\App`

| Helper | Extension |
|--------|-----------|
| `mtl_app_init` | `init` |
| `mtl_app_poll` | `poll` |
| `mtl_app_run` | `run` |
| `mtl_app_terminate` | `terminate` |
| `mtl_app_should_quit` | `shouldQuit` |
| `mtl_app_reset_quit` | `resetQuit` |

## Window — `Metal\MTL\Window`

| Helper | Extension |
|--------|-----------|
| `mtl_window_create` | `create` |
| `mtl_window_destroy` | `destroy` |
| `mtl_window_set_title` | `setTitle` |
| `mtl_window_show` | `show` |
| `mtl_window_hide` | `hide` |
| `mtl_window_should_close` | `shouldClose` |
| `mtl_window_get_width` | `getWidth` |
| `mtl_window_get_height` | `getHeight` |
| `mtl_window_attach_device` | `attachDevice` |
| `mtl_window_get_layer` | `getLayer` |
| `mtl_window_clear` | `clear` |

`mtl_window_clear($window, $r, $g, $b, $a = 255)` — integer RGBA **0..255**. See [RGBA clear](../conventions/rgba-clear.md). Attach a device before clear: [attach device before clear](../traps/attach-device-before-clear.md).

## Menu — `Metal\MTL\Menu`

| Helper | Extension |
|--------|-----------|
| `mtl_menu_install_default` | `installDefault` |
| `mtl_menu_add_item` | `addItem` |
| `mtl_menu_poll_action` | `pollAction` |

## Device — `Metal\MTL\Device`

| Helper | Extension |
|--------|-----------|
| `mtl_device_create_system_default` | `createSystemDefault` |
| `mtl_device_release` | `release` |
| `mtl_device_new_command_queue` | `newCommandQueue` |
| `mtl_command_queue_release` | `releaseCommandQueue` |
| `mtl_device_get_name` | `getName` |

Note: `releaseCommandQueue` maps to helper name `mtl_command_queue_release` (not `mtl_device_*`).[^helper-names]

# Minimal loop (from README)

```php
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

[^helper-names]: HelperNames map
[^frozen]: Frozen ext-metal 0.7.0 surface
