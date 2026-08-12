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
7. **Always** keep the `.okf/` bundle current when changing API, wrap model, or packaging; append `.okf/log.md`.

## Package rules (quick) — 0.7.x

- Composer: `microscrap/metal` **0.7.5**. PHP `^8.4|^8.5|^8.6`. Requires `ext-metal` `^0.7.4`.
- **CI:** `.github/workflows/tests.yml` validate **must** keep `--no-check-version` while `composer.json` has a `version` field. Do not strip workflow flags in OKF/docs drive-bys — see `.okf/traps/ci-validate-flags.md`.
- Namespace: `Microscrap\Bindings\Metal\` → `src/` (Enums when present; helpers are global functions).
- **Helpers-only** (posix / ftdi / cuda style) — no ServiceProvider, no facade classes over App/Window/Menu/Device/Texture/Input.
- Helper names match the C ABI (`mtl_app_init`, `mtl_window_create`, `mtl_texture_create_rgba8`, `mtl_input_key_down`, …).
- Opaque handles stay as `int`; do not invent DataObject wrappers unless product scope changes.
- No exceptions in `src/`; C-style bool/int returns.
- Enums are backed (int/string); cases **FULLY UPPERCASE**; no PHP class-level constants. Input enums: `KeyCode`, `MouseButton`, `GamepadButton`, `GamepadAxis`.
- User-facing copy says **macOS**, never Darwin (machine tokens like `uname` / PIE `os-families` stay in the extension).
- Do not conflate with `php-io-extensions/metal` (native extension) or `microscrap/metal-gfx` (tubes).
