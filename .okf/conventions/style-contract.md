---
type: Convention
title: Style contract
description: function_exists guards, no throws, no class constants, backed UPPERCASE enums
tags: [metal, microscrap, style, convention]
resource: ../tests/Unit/StyleAuditTest.php
status: draft
generated: { by: okf-documentation-generator/cursor, at: 2026-08-09T02:19:38Z }
sources:
  - id: style
    resource: ../tests/Unit/StyleAuditTest.php
    title: StyleAuditTest
  - id: agents
    resource: ../AGENTS.md
    title: Agent guidelines
---

# Enforced by StyleAuditTest

Pest audits under `tests/Unit/StyleAuditTest.php` lock these rules for everything under `src/`:[^style]

| Rule | Detail |
|------|--------|
| `function_exists` | Every helper function declaration is preceded by a `function_exists` guard |
| No `throw` | No `T_THROW` tokens anywhere in `src/` |
| No class constants | No `T_CONST` tokens in `src/` (prefer backed Enums) |
| Enums backed | If `src/Enums/` exists, every enum is `: int` or `: string` |
| Enum cases | Case names are **FULLY UPPERCASE** |

# Returns

Prefer C-style success signaling: `bool` / `int` returns (`false` / `0` on failure). Do not invent exception types in this package.[^agents]

# Prefer `is_null`

Project PHP style prefers `is_null($var)` over `$var === null` (agent guidelines / house style). StyleAudit does not currently tokenize that preference.

[^style]: StyleAuditTest
[^agents]: Agent guidelines
