---
type: Architecture
title: Helpers → Metal\MTL\*
description: Wrap model — global mtl_* helpers call extension statics; opaque int handles
tags: [metal, microscrap, architecture, handles]
resource: ../src/Helpers/
status: draft
generated: { by: okf-documentation-generator/cursor, at: 2026-08-09T02:19:38Z }
sources:
  - id: readme
    resource: ../README.md
    title: Package README
  - id: mtl-app
    resource: ../src/Helpers/mtl-app.php
    title: App helpers
  - id: mtl-window
    resource: ../src/Helpers/mtl-window.php
    title: Window helpers
  - id: mtl-menu
    resource: ../src/Helpers/mtl-menu.php
    title: Menu helpers
  - id: mtl-device
    resource: ../src/Helpers/mtl-device.php
    title: Device helpers
---

# Call stack

```
PHP app
  → mtl_* helper (this package)
    → Metal\MTL\{App,Window,Menu,Device}::method (ext-metal)
      → C ABI / Objective-C (extension)
```

Same tier as **posix / ftdi / cuda**: helpers call extension statics directly. No microscrap facade classes, no DataObject handle wrappers.[^readme]

# Opaque handles

| Kind | PHP type | Sentinel |
|------|----------|----------|
| Window / device / layer / queue | `int` | `0` = failure / none |

Helpers pass handles through unchanged. Callers check `> 0` for success on create paths (see feature tests).[^mtl-device]

# File → class map

| Helper file | Extension class |
|-------------|-----------------|
| `mtl-app.php` | `Metal\MTL\App` |
| `mtl-window.php` | `Metal\MTL\Window` |
| `mtl-menu.php` | `Metal\MTL\Menu` |
| `mtl-device.php` | `Metal\MTL\Device` |

Full helper inventory: [API helper map](../api/helper-map.md).

[^readme]: Package README
[^mtl-device]: Device helpers
