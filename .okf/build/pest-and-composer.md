---
type: Playbook
title: Pest + Composer
description: CoverageTest and StyleAudit; ignore-platform-req when ext-metal is absent
tags: [metal, microscrap, pest, composer, build]
resource: ../tests/Unit/CoverageTest.php
status: draft
generated: { by: okf-documentation-generator/cursor, at: 2026-08-09T02:19:38Z }
sources:
  - id: coverage
    resource: ../tests/Unit/CoverageTest.php
    title: CoverageTest
  - id: style
    resource: ../tests/Unit/StyleAuditTest.php
    title: StyleAuditTest
  - id: composer
    resource: ../composer.json
    title: Package composer.json
  - id: frozen
    resource: ../tests/Support/extension-methods-0.7.1.php
    title: Frozen ext-metal 0.7.1 surface
---

# Dev dependencies

`require-dev`: `pestphp/pest` `^4`.[^composer]

# Install without the extension

Composer requires `ext-metal`. On hosts without it (Linux CI, docs machines):

```bash
composer install --ignore-platform-req=ext-metal
# or
composer update --ignore-platform-req=ext-metal
```

# Tests that matter for this package

| Test | Role |
|------|------|
| `tests/Unit/CoverageTest.php` | Every frozen `Metal\MTL\*` method has a C ABI helper; optional live reflection when ext loaded[^coverage] |
| `tests/Unit/StyleAuditTest.php` | No class consts / no throws / `function_exists` / enum rules[^style] |
| `tests/Feature/AppFeatureTest.php` | Live smoke when `extension_loaded('metal')` |

Frozen surface file: `tests/Support/extension-methods-0.7.1.php`. Naming map: `tests/Support/HelperNames.php`.[^frozen]

# Run

```bash
./vendor/bin/pest
```

When bumping to a new ext-metal minor, update the frozen map + `HelperNames` and re-run CoverageTest before tagging this package.

[^composer]: Package composer.json
[^coverage]: CoverageTest
[^style]: StyleAuditTest
[^frozen]: Frozen ext-metal 0.7.1 surface
