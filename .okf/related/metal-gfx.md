---
type: Related
title: metal-gfx peer package
description: Tubes Deferred framebuffer registration lives in microscrap/metal-gfx — not here
tags: [metal, microscrap, metal-gfx, boundaries]
status: draft
generated: { by: cursor-agent/grok-4.5, at: "2026-08-09T03:10:00Z" }
sources:
  - id: readme
    resource: ../README.md
    title: Package README
  - id: agents
    resource: ../AGENTS.md
    title: Agent guidelines
---

# Boundary

| Package | Responsibility |
|---------|----------------|
| `microscrap/metal` (this) | Helpers-only bindings over `ext-metal` (`mtl_*`, including Texture) |
| `microscrap/metal-gfx` | Tubes `DeferredFramebuffer` registration via `MetalHandledFramebuffer` |

Do **not** invent ServiceProviders, Framebuffers, or GFX registration inside this package.[^readme][^agents]

# How metal-gfx uses this package

`metal-gfx` requires `microscrap/metal` `^0.7.1` and `ext-metal` `^0.7.1`. Headless path: device + command queue + **`mtl_texture_*` / `Metal\MTL\Texture`** as the GPU target (not a CPU shadow store). Window attach stays deferred until tubes OSWindows support lands.

# Status

`metal-gfx` is a **peer** package (same pattern as `sdl3-gfx`), not missing code to add here.

[^readme]: Package README
[^agents]: Agent guidelines
