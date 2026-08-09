---
type: Orientation
title: macOS platform
description: Runtime is macOS-only; user-facing copy says macOS not Darwin
tags: [metal, microscrap, macos]
status: draft
generated: { by: okf-documentation-generator/cursor, at: 2026-08-09T02:19:38Z }
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

# Runtime

`ext-metal` only loads on **macOS**. This package inherits that constraint: AppKit / Metal helpers will not run on Linux or Windows.[^readme]

Composer keywords and description say `macos`; there is no platform package constraint in `composer.json` beyond `ext-metal`.[^composer]

# Wording rule

| Audience | Term |
|----------|------|
| README, docs, agent guidance, OKF | **macOS** |
| Extension build tokens (`uname`, PIE `os-families`) | May say Darwin — **only** inside `php-io-extensions/metal` |

Do not write “Darwin” in user-facing copy for this package.[^agents]

# CI implication

Linux CI hosts cannot exercise live Metal feature tests. See [Linux CI without Metal](../traps/linux-ci.md).

[^readme]: Package README
[^composer]: Package composer.json
[^agents]: Agent guidelines
