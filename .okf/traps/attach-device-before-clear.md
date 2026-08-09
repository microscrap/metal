---
type: Trap
title: Attach device before clear
description: Call mtl_window_attach_device before mtl_window_clear or the layer has no device
tags: [metal, microscrap, trap, window]
status: draft
generated: { by: okf-documentation-generator/cursor, at: 2026-08-09T02:19:38Z }
sources:
  - id: readme
    resource: ../README.md
    title: Package README
  - id: mtl-window
    resource: ../src/Helpers/mtl-window.php
    title: Window helpers
---

# Trap

Creating and showing a window, then calling `mtl_window_clear` **without** `mtl_window_attach_device`, leaves the CAMetalLayer without a device. Clear/present will not behave as a working demo.[^readme]

# Correct order

```php
$device = mtl_device_create_system_default();
$window = mtl_window_create('hello', 640, 480);
mtl_window_attach_device($window, $device); // required before clear
mtl_window_show($window);
mtl_window_clear($window, 32, 64, 128, 255);
```

Helpers mirror extension order; they do not auto-attach.[^mtl-window]

[^readme]: Package README
[^mtl-window]: Window helpers
