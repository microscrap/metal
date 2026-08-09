---
okf_version: "0.2"
---

# microscrap/metal Knowledge Bundle

Package knowledge for `microscrap/metal` (macOS Metal + AppKit helpers over **ext-metal**, v0.7.0).
Read this index first; open only the concepts needed for the task.

**Trust rule:** Prefer `status: stable`. Treat `deprecated` as historical only. New agent-written concepts stay `status: draft` until a human verifies them.
**Placement:** This bundle lives at the **package root** only — never under `src/`.
**Links:** Concept cross-links use paths relative to each file.
**Scope:** Document the helpers-only bindings package. Do **not** invent ServiceProviders, Framebuffers, or GFX registration here — those belong in `microscrap/metal-gfx` / tubes.
**Dist note:** `.okf/` and root `AGENTS.md` are `export-ignore` in `.gitattributes` so Composer dist packages do not ship this bundle.

# Orientation

* [Package (0.7)](orientation/package.md) - Composer identity, helpers over Metal\MTL\*.

# Conventions

* [Helpers-only C ABI](conventions/helpers-only-c-abi.md) - posix/ftdi/cuda wrap model; no facades.

# Log

* [Directory update log](log.md)
