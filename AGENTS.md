# Agent guidelines — microscrap/metal

## Knowledge Bundle (OKF)

This package ships an Open Knowledge Format bundle at [`.okf/`](.okf/) (excluded from Composer dist via `.gitattributes` `export-ignore`).

Before changing bindings code or advising on Metal PHP wrappers **for this package**:

1. Read [`.okf/index.md`](.okf/index.md) first (progressive disclosure).
2. Open only the linked concepts needed for the task.
3. Prefer `status: stable` concepts; treat `deprecated` as historical only. New/changed concepts stay `status: draft` until a human verifies them.
4. When you learn something durable about **this package**, update the affected `.okf` concept(s) and append `.okf/log.md`.
5. Keep the `.okf` bundle at the **package root** only — do not nest extra `.okf` folders under `src/`.
6. Tubes framebuffer / GFX registration belongs in `microscrap/metal-gfx`. Extension build knowledge belongs with `php-io-extensions/metal`.

## Package rules (quick) — 0.7.x

- Composer: `microscrap/metal` **0.7.0**. PHP `^8.4|^8.5|^8.6`. Requires `ext-metal` `^0.7.0`.
- Namespace: `Microscrap\Bindings\Metal\` → `src/` (Enums when present; helpers are global functions).
- **Helpers-only** (posix / ftdi / cuda style) — no ServiceProvider, no facade classes over App/Window/Menu/Device.
- Helper names match the C ABI (`mtl_app_init`, `mtl_window_create`, …).
- Opaque handles stay as `int`; do not invent DataObject wrappers unless product scope changes.
- No exceptions in `src/`; C-style bool/int returns.
- Enums (if added) are backed (int/string); cases **FULLY UPPERCASE**; no PHP class-level constants.
- User-facing copy says **macOS**, never Darwin (machine tokens like `uname` / PIE `os-families` stay in the extension).
- Do not conflate with `php-io-extensions/metal` (native extension) or `microscrap/metal-gfx` (tubes).
