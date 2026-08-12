---
okf_version: "0.2"
---

# microscrap/metal Knowledge Bundle

Package knowledge for `microscrap/metal` (macOS Metal + AppKit helpers over **ext-metal**, v0.7.5).
Read this index first; open only the concepts needed for the task.

**Trust rule:** Prefer `status: stable`. Treat `deprecated` as historical only. New agent-written concepts stay `status: draft` until a human verifies them.
**Placement:** This bundle lives at the **package root** only — never under `src/`.
**Links:** Concept cross-links use paths relative to each file.
**Scope:** Document the helpers-only bindings package. Do **not** invent ServiceProviders, Framebuffers, or GFX registration here — those belong in `microscrap/metal-gfx` / tubes.
**Dist note:** `.okf/` and root `AGENTS.md` are `export-ignore` in `.gitattributes` so Composer dist packages do not ship this bundle.

# Orientation

* [Package (0.7)](orientation/package.md) - Composer identity, macOS scope, helpers over Metal\MTL\*.
* [Relationship to ext-metal](orientation/relationship-to-ext.md) - Bindings vs php-io-extensions/metal.
* [macOS platform](orientation/macos-platform.md) - macOS-only; say macOS not Darwin.

# Architecture

* [Helpers → Metal\MTL\*](architecture/helpers-mtl-ext.md) - Wrap model and opaque int handles.

# API

* [Helper map (mtl_*)](api/helper-map.md) - App / Window / Menu / Device / Texture / Input helpers.

# Conventions

* [Helpers-only C ABI](conventions/helpers-only-c-abi.md) - posix/ftdi/cuda wrap model; no facades.
* [Style contract](conventions/style-contract.md) - function_exists, no throws, no class consts, UPPERCASE enums.
* [RGBA clear 0..255](conventions/rgba-clear.md) - integer clear channels matching Window::clear / Texture::clear.

# Traps

* [Missing ext-metal](traps/missing-ext-metal.md) - Helpers need the loaded extension.
* [Linux CI without Metal](traps/linux-ci.md) - Unit tests without ext; feature tests skip.
* [Do not strip CI validate flags](traps/ci-validate-flags.md) - keep `--no-check-version`; no quiet CI flag removals.
* [Attach device before clear](traps/attach-device-before-clear.md) - attachDevice before window clear.
* [make -j1 is extension-side](traps/make-j1-is-extension.md) - PIE/make flags are for ext-metal.

# Build & test

* [Pest + Composer](build/pest-and-composer.md) - CoverageTest, StyleAudit, ignore-platform-req.

# Related

* [metal-gfx peer package](related/metal-gfx.md) - Tubes Deferred framebuffer uses Texture helpers.

# Indexes

* [Orientation](orientation/)
* [Architecture](architecture/)
* [API](api/)
* [Conventions](conventions/)
* [Traps](traps/)
* [Build & test](build/)
* [Related](related/)

# Log

* [Directory update log](log.md)
