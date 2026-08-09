---
type: Convention
title: Helpers-only C ABI
description: 1:1 wrap model matching posix/ftdi/cuda; no facades or GFX registration
tags: [metal, microscrap, helpers, convention]
status: draft
generated: { by: okf-documentation-generator/cursor, at: 2026-08-09T02:19:38Z }
sources:
  - id: readme
    resource: ../README.md
    title: Package README
  - id: agents
    resource: ../AGENTS.md
    title: Agent guidelines
  - id: helpers
    resource: ../src/Helpers/
    title: Helper sources
---

# Rule

Helpers are the public surface. They:

1. Are named after the Objective-C bridge C ABI (`mtl_*`).
2. Call `Metal\MTL\*` static methods only (never reimplement native work).
3. Are wrapped in `function_exists` guards.
4. Never throw from `src/`.
5. Pass opaque `int` handles through unchanged.

Same tier as **posix / ftdi / cuda** — not the sdl3/glfw facade style.[^readme][^agents]

# Not this package

- Static facade classes under `Microscrap\Bindings\Metal\` wrapping App/Window/Menu/Device.
- DataObject handle wrappers.
- ScrapyardIO ServiceProviders / tubes framebuffer drivers (`metal-gfx`).

See also: [style contract](style-contract.md), [RGBA clear](rgba-clear.md), [metal-gfx out of scope](../related/metal-gfx.md).

[^readme]: Package README
[^agents]: Agent guidelines
