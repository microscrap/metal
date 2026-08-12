---
type: Trap
title: Linux CI without Metal
description: macOS-only extension — Linux CI cannot run live Metal feature tests
tags: [metal, microscrap, trap, ci, macos]
status: draft
generated: { by: okf-documentation-generator/cursor, at: 2026-08-09T02:19:38Z }
sources:
  - id: readme
    resource: ../README.md
    title: Package README
  - id: feature
    resource: ../tests/Feature/AppFeatureTest.php
    title: AppFeatureTest
  - id: coverage
    resource: ../tests/Unit/CoverageTest.php
    title: CoverageTest
---

# Trap

Expecting Linux CI to load `ext-metal` or paint windows will fail. The extension is **macOS-only**; this bindings package cannot change that.[^readme]

# What still works on Linux

| Suite | Needs ext-metal? |
|-------|------------------|
| `CoverageTest` (frozen surface ↔ helpers) | No — compares source to frozen map |
| `StyleAuditTest` | No — tokenizes `src/` |
| Optional live reflection half of CoverageTest | Skips / no-ops when extension absent[^coverage] |
| `AppFeatureTest` | Skips when `! extension_loaded('metal')`[^feature] |

# Practice

- Run unit coverage + style on any platform with PHP + Composer (`--ignore-platform-req=ext-metal` if needed).
- Run feature / live reflection on a macOS host with `ext-metal` loaded.
- Do not add fake Linux Metal stubs in this package.
- Keep Actions validate flags intact — especially `--no-check-version` (see [Do not strip CI validate flags](ci-validate-flags.md)).

[^readme]: Package README
[^feature]: AppFeatureTest
[^coverage]: CoverageTest
