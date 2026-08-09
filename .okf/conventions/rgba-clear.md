---
type: Convention
title: RGBA clear 0..255
description: mtl_window_clear uses integer RGBA channels 0..255 matching Window::clear
tags: [metal, microscrap, window, clear]
resource: ../src/Helpers/mtl-window.php
status: draft
generated: { by: okf-documentation-generator/cursor, at: 2026-08-09T02:19:38Z }
sources:
  - id: mtl-window
    resource: ../src/Helpers/mtl-window.php
    title: Window helpers
  - id: readme
    resource: ../README.md
    title: Package README
---

# Signature

```php
mtl_window_clear(int $window, int $r, int $g, int $b, int $a = 255): bool
```

Channels are **integer 0..255**, same as `Metal\MTL\Window::clear`. Do not pass normalized floats 0.0..1.0.[^mtl-window][^readme]

# Prerequisite

Attach a Metal device to the window before clear succeeds usefully:

```php
mtl_window_attach_device($window, $device);
mtl_window_clear($window, 32, 64, 128, 255);
```

See [attach device before clear](../traps/attach-device-before-clear.md).

[^mtl-window]: Window helpers
[^readme]: Package README
