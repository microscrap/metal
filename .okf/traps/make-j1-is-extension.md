---
type: Trap
title: make -j1 is extension-side
description: Parallel-make / PIE --make-parallel-jobs=1 belongs to php-io-extensions/metal, not this package
tags: [metal, microscrap, trap, build]
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

# Trap

Copying `make -j1` or PIE `--make-parallel-jobs=1` into **this** package’s docs/scripts as if it were a Composer-library build step.

# Reality

- `microscrap/metal` is a pure PHP Composer package — no Makefile, no `phpize`.
- Conservative ObjC / `Makefile.frag` builds live in **`php-io-extensions/metal`**.
- README mentions PIE `--make-parallel-jobs=1` only when installing the **extension**.[^readme]

# Agent rule

Extension build knowledge belongs with `php-io-extensions/metal`. Do not invent build tooling here.[^agents]

[^readme]: Package README
[^agents]: Agent guidelines
