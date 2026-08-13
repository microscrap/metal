# OKF log

## 2026-08-12

- **Tetriminos poll retain (debug-641660)**: `mousePosition`/`mouseScrollDelta` Zephir arrays ~112 B/poll; `Menu::pollAction` `RETURN_CTORW` empty string ~32 B/pollNative. Added scalar `mouseX`/`mouseY`/`mouseScrollY`. `pollAction` uses `RETURN_EMPTY_STRING()`. Copy rebuilt `metal.so` to Herd `config/php/84/metal.so` (30-metal.ini absolute path), not only `extensions/`.

- **CI**: Restored `--no-check-version` on `composer validate --strict` after `(0.7.3) - OKF` quietly dropped it and broke Actions again. New trap [ci-validate-flags.md](traps/ci-validate-flags.md): **do not quietly remove CI flags**. Playbook [pest-and-composer.md](build/pest-and-composer.md) documents the required validate line; frozen surface pointer → `0.7.4`.
- **0.7.5 / 0.7.4**: `mtl_texture_fill_rect` → `Texture::fillRect` (one `replaceRegion` solid rect). Requires `ext-metal` `^0.7.4`. Frozen surface `extension-methods-0.7.4.php`. Fixes metal-gfx `setSegment` / Tetris fillRect lag.

## 2026-08-09

- **0.7.3**: `mtl_input_*` helpers + `KeyCode` / `MouseButton` / `GamepadButton` / `GamepadAxis` enums over ext-metal `Metal\MTL\Input`. Frozen surface `extension-methods-0.7.3.php`; require `ext-metal` `^0.7.3`. Unblocks `hi-metal-gfx` Human Input.
- **0.7.2**: `mtl_window_get_device` + `mtl_window_present_texture` for metal-gfx windowed blit present. Frozen surface `extension-methods-0.7.2.php`; require `ext-metal` `^0.7.2`.
- **0.7.1**: Document Texture helpers (`mtl_texture_*` → `Metal\MTL\Texture`), require `ext-metal` `^0.7.1`, frozen surface `extension-methods-0.7.1.php`. metal-gfx is a peer that consumes Texture for Deferred framebuffers. ScrapyardIO ecosystem seeders updated accordingly.

## 2026-08-08

- **Update**: README badges + ScrapyardIO prod docs link; GitHub Actions `.github/workflows/tests.yml` (PHP 8.4/8.5, `--ignore-platform-req=ext-metal`); `composer.json` `support.docs/issues/source`.
- **Update**: Expanded bundle for `microscrap/metal` 0.7.0 against OKF SPEC v0.2 — orientation (ext relationship, macOS wording), architecture wrap model, API helper map, conventions (style + RGBA), traps (missing ext, Linux CI, attach-before-clear, make -j1), Pest/Composer playbook, metal-gfx boundary; refreshed root `index.md` and subdirectory indexes. All new/changed concepts remain `status: draft`.
- Initial bundle for `microscrap/metal` 0.7.0 helpers-only wrap of `ext-metal` 0.7.0.
