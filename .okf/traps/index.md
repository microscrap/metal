# Traps

* [Missing ext-metal](missing-ext-metal.md) - Helpers need the loaded extension.
* [Linux CI without Metal](linux-ci.md) - macOS-only; unit tests still run without ext.
* [Do not strip CI validate flags](ci-validate-flags.md) - keep `--no-check-version`; do not quietly remove CI flags.
* [Attach device before clear](attach-device-before-clear.md) - attachDevice before clear/present.
* [make -j1 is extension-side](make-j1-is-extension.md) - PIE/make flags are for ext-metal, not this library.
