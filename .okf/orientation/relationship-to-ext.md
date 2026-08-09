---
type: Orientation
title: Relationship to ext-metal
description: microscrap/metal is PHP helpers; php-io-extensions/metal is the native extension
tags: [metal, microscrap, ext-metal, boundaries]
status: draft
generated: { by: cursor-agent/grok-4.5, at: "2026-08-09T03:10:00Z" }
sources:
  - id: readme
    resource: ../README.md
    title: Package README
  - id: agents
    resource: ../AGENTS.md
    title: Agent guidelines
  - id: composer
    resource: ../composer.json
    title: Package composer.json
---

# Two packages, one surface version

| Layer | Package | Role |
|-------|---------|------|
| Native | `php-io-extensions/metal` (`ext-metal` ^0.7.1) | Zephir `Metal\MTL\*` → C ABI → Objective-C (AppKit + Metal) |
| Bindings | `microscrap/metal` **0.7.1** | Global `mtl_*` helpers that call those statics |

Version alignment: this package requires `ext-metal` `^0.7.1` and freezes its expected method surface in `tests/Support/extension-methods-0.7.1.php`.[^composer]

# Install the extension separately

Helpers do nothing useful until `ext-metal` is loaded. README installs via PIE:[^readme]

```bash
pie install php-io-extensions/metal:0.7.x-dev --make-parallel-jobs=1
php -m | grep metal
composer require microscrap/metal:^0.7.1
```

Build flags such as `--make-parallel-jobs=1` / `make -j1` apply to the **extension** build, not to this Composer library. See [make -j1 is extension-side](../traps/make-j1-is-extension.md).

# Where knowledge lives

| Concern | Bundle |
|---------|--------|
| ObjC bridge, Makefile.frag, PIE, macOS build traps, Texture ABI | `php-io-extensions/metal` `.okf/` |
| Helper names, wrap rules, Pest coverage, composer install without ext | **this** `.okf/` |
| Tubes Deferred framebuffer drivers | `microscrap/metal-gfx` |

[^composer]: Package composer.json
[^readme]: Package README
