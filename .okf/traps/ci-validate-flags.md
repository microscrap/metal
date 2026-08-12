---
type: Trap
title: Do not strip CI validate flags
description: --no-check-version is required while composer.json keeps a version field; removing it silently breaks GitHub Actions
tags: [metal, microscrap, trap, ci, composer]
status: draft
generated: { by: cursor, at: 2026-08-12T14:41:00Z }
sources:
  - id: workflow
    resource: ../.github/workflows/tests.yml
    title: GitHub Actions Tests workflow
  - id: composer
    resource: ../composer.json
    title: Package composer.json
---

# Trap

**Stop quietly removing shit from CI.**

`composer.json` keeps a top-level `version` field (packaging / tags). GitHub Actions runs:

```bash
composer validate --strict --no-check-publish --no-check-version
```

Without `--no-check-version`, `--strict` turns Composer’s “version field is present” **warning** into exit **1**. The Tests job dies on PHP 8.4/8.5 **before** `composer install` or Pest.[^workflow][^composer]

# What already happened

| Commit | What |
|--------|------|
| `6d3057b` | Added `--no-check-version` on purpose after CI failed |
| `3b6c5ad` `(0.7.3) - OKF` | Dropped the flag in a drive-by workflow edit — CI broken again until restored |

If you touch `.github/workflows/tests.yml` for docs/OKF/formatting, **diff the validate line**. Do not “simplify” flags you do not understand.

# Practice

- Leave `--no-check-version` alone while `version` stays in `composer.json`.
- Prefer removing the `version` field *and* coordinating Packagist/tagging before dropping the flag — never half-delete.
- Reproduce locally: `composer validate --strict --no-check-publish` (fails) vs same with `--no-check-version` (passes).

[^workflow]: GitHub Actions Tests workflow
[^composer]: Package composer.json
