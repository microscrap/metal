---
type: Orientation
title: Package (0.7)
description: Composer identity and wrap model for microscrap/metal
tags: [metal, microscrap, bindings, macos]
status: draft
---

# Identity

| Field | Value |
|-------|--------|
| Composer | `microscrap/metal` **0.7.0** |
| PHP | `^8.4\|^8.5\|^8.6` |
| Requires | `ext-metal` `^0.7.0` |
| Platform | macOS only (via extension) |
| Namespace | `Microscrap\Bindings\Metal\` (Enums when present) |
| Helpers | `src/Helpers/mtl-{app,window,menu,device}.php` |

# Wrap model

Same tier as **posix / ftdi / cuda**: global helpers call extension statics directly. No microscrap facade classes.

| Helpers | Extension |
|---------|-----------|
| `mtl_app_*` | `Metal\MTL\App` |
| `mtl_window_*` | `Metal\MTL\Window` |
| `mtl_menu_*` | `Metal\MTL\Menu` |
| `mtl_device_*` / `mtl_command_queue_release` | `Metal\MTL\Device` |

Opaque `int` handles pass through unchanged (`0` = failure / none).
