---
type: Trap
title: Missing ext-metal
description: Helpers require the metal extension; without it Metal\MTL classes are undefined
tags: [metal, microscrap, trap, ext-metal]
status: draft
generated: { by: okf-documentation-generator/cursor, at: 2026-08-09T02:19:38Z }
sources:
  - id: composer
    resource: ../composer.json
    title: Package composer.json
  - id: feature
    resource: ../tests/Feature/AppFeatureTest.php
    title: AppFeatureTest
  - id: readme
    resource: ../README.md
    title: Package README
---

# Symptom

Calling any `mtl_*` helper when `ext-metal` is not loaded fatals on missing `Metal\MTL\*` classes (autoload resolves helpers, not the extension).

# Checks

```bash
php -m | grep metal
```

Feature tests skip when the extension is absent:[^feature]

```php
if (! extension_loaded('metal')) {
    $this->markTestSkipped('ext-metal is not loaded');
}
```

# Install

```bash
pie install php-io-extensions/metal:0.7.x-dev --make-parallel-jobs=1
```

Composer `require` declares `"ext-metal": "^0.7.1"`. To install this library on a machine without the extension (docs/CI lint only), use `--ignore-platform-req=ext-metal`. See [Pest + Composer](../build/pest-and-composer.md).

[^feature]: AppFeatureTest
[^readme]: Package README
