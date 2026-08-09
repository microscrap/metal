---
type: Related
title: metal-gfx out of scope
description: Tubes framebuffer / GFX registration belongs in microscrap/metal-gfx — not here
tags: [metal, microscrap, metal-gfx, boundaries]
status: draft
generated: { by: okf-documentation-generator/cursor, at: 2026-08-09T02:19:38Z }
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
| `microscrap/metal` (this) | Helpers-only bindings over `ext-metal` |
| `microscrap/metal-gfx` | Future / separate — tubes framebuffer registration, ScrapyardIO GFX drivers |

Do **not** invent ServiceProviders, Framebuffers, or GFX registration inside this package.[^readme][^agents]

# Status

`metal-gfx` is out of scope for 0.7.0 of this bindings package. Treat it as a future peer (same pattern as `sdl3-gfx` / `cuda-gfx`), not as missing code to add here.

[^readme]: Package README
[^agents]: Agent guidelines
