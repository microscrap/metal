---
type: Convention
title: Helpers-only C ABI
description: 1:1 wrap model matching posix/ftdi/cuda
tags: [metal, microscrap, helpers]
status: draft
---

# Rule

Helpers are the public surface. They:

1. Are named after the Objective-C bridge C ABI (`mtl_*`).
2. Call `Metal\MTL\*` static methods only (never reimplement native work).
3. Are wrapped in `function_exists` guards.
4. Never throw from `src/`.

# Not this package

- Static facade classes under `Microscrap\Bindings\Metal\` (that is the sdl3/glfw style).
- DataObject handle wrappers.
- ScrapyardIO ServiceProviders / tubes framebuffer drivers (`metal-gfx`).
