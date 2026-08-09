---
type: APIMap
title: Helper map (mtl_*)
description: App / Window / Menu / Device / Texture / Input helpers mapped to Metal\MTL\* methods
tags: [metal, microscrap, api, helpers]
resource: ../tests/Support/HelperNames.php
status: draft
generated: { by: cursor-agent/grok-4.5, at: "2026-08-09T06:55:00Z" }
sources:
  - id: helper-names
    resource: ../tests/Support/HelperNames.php
    title: HelperNames map
  - id: frozen
    resource: ../tests/Support/extension-methods-0.7.3.php
    title: Frozen ext-metal 0.7.3 surface
  - id: readme
    resource: ../README.md
    title: Package README
---

# Surface (ext-metal 0.7.3)

Frozen method list lives in `tests/Support/extension-methods-0.7.3.php`. C ABI names are enforced by `HelperNames` + `CoverageTest`.[^frozen][^helper-names]

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
| `mtl_window_get_device` | `getDevice` |
| `mtl_window_present_texture` | `presentTexture` |

`mtl_window_clear($window, $r, $g, $b, $a = 255)` — integer RGBA **0..255**. See [RGBA clear](../conventions/rgba-clear.md). Attach a device before clear: [attach device before clear](../traps/attach-device-before-clear.md).

`mtl_window_present_texture($window, $texture)` (ext-metal **0.7.2+**) blits an RGBA8 offscreen texture to the window `CAMetalLayer` — used by metal-gfx windowed present (no PHP flush).

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

## Texture — `Metal\MTL\Texture` (0.7.1+)

Offscreen RGBA8Unorm — no window required. Used by metal-gfx Deferred framebuffers and headless engines/UIs.

| Helper | Extension |
|--------|-----------|
| `mtl_texture_create_rgba8` | `create` |
| `mtl_texture_release` | `release` |
| `mtl_texture_get_width` | `getWidth` |
| `mtl_texture_get_height` | `getHeight` |
| `mtl_texture_clear` | `clear` |
| `mtl_texture_write_pixel` | `writePixel` |
| `mtl_texture_read_pixel` | `readPixel` |
| `mtl_texture_read_rgba8` | `readPixels` |

## Input — `Metal\MTL\Input` (0.7.3+)

Keyboard / mouse / gamepad. Call `mtl_app_poll()` each frame so scroll deltas reset. Enums: `KeyCode`, `MouseButton`, `GamepadButton`, `GamepadAxis`.

| Helper | Extension |
|--------|-----------|
| `mtl_input_key_down` | `keyDown` |
| `mtl_input_mouse_button_down` | `mouseButtonDown` |
| `mtl_input_mouse_position` | `mousePosition` |
| `mtl_input_mouse_scroll_delta` | `mouseScrollDelta` |
| `mtl_input_gamepad_count` | `gamepadCount` |
| `mtl_input_gamepad_name` | `gamepadName` |
| `mtl_input_gamepad_button_down` | `gamepadButtonDown` |
| `mtl_input_gamepad_axis` | `gamepadAxis` |
| `mtl_input_gamepad_state` | `gamepadState` (PHP snapshot; no dedicated C entry) |

Y grows upward (AppKit). Key codes are macOS virtual key codes. Gamepads use GameController via ext-metal — not SDL/GLFW.

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
[^frozen]: Frozen ext-metal 0.7.1 surface
