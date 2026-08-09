---
type: Orientation
title: Package (0.7)
description: Composer identity, macOS scope, and helpers over Metal\MTL\* for microscrap/metal 0.7.3
tags: [metal, microscrap, bindings, macos]
resource: ../composer.json
status: draft
generated: { by: cursor-agent/grok-4.5, at: "2026-08-09T06:55:00Z" }
sources:
  - id: composer
    resource: ../composer.json
    title: Package composer.json
  - id: readme
    resource: ../README.md
    title: Package README
  - id: agents
    resource: ../AGENTS.md
    title: Agent guidelines
---

# Identity

| Field | Value |
|-------|--------|
| Composer | `microscrap/metal` **0.7.3** |
| PHP | `^8.4\|^8.5\|^8.6` |
| Requires | `ext-metal` `^0.7.3` |
| Platform | **macOS** only (enforced by the extension) |
| Namespace | `Microscrap\Bindings\Metal\` → `src/` (Enums when present) |
| Public surface | Global helpers in `src/Helpers/mtl-{app,window,menu,device,texture,input}.php` |
| License | MIT |

# What this package is

A **helpers-only** PHP bindings layer over [php-io-extensions/metal](https://github.com/php-io-extensions/metal) (`ext-metal`). Each helper delegates to `Metal\MTL\{App,Window,Menu,Device,Texture,Input}` static methods. Opaque handles stay as `int` (`0` = failure / none).[^readme]

# What this package is not

- The native extension (Zephir / ObjC / PIE) — see [relationship to ext-metal](relationship-to-ext.md).
- Tubes framebuffer / GFX registration — see [metal-gfx](../related/metal-gfx.md).
- Facade classes under `Microscrap\Bindings\Metal\` (that is the sdl3/glfw style, not this package).

# Platform wording

User-facing copy says **macOS**, never Darwin. Machine tokens (`uname`, PIE `os-families`) belong in the extension package, not here.[^agents]

# Autoload

Composer autoloads the six helper files via `autoload.files` and PSR-4 for `Microscrap\Bindings\Metal\` → `src/`.[^composer]

[^composer]: Package composer.json
[^readme]: Package README
[^agents]: Agent guidelines
