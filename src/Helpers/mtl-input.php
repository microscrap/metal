<?php

use Metal\MTL\Input;
use Microscrap\Bindings\Metal\Enums\GamepadAxis;
use Microscrap\Bindings\Metal\Enums\GamepadButton;
use Microscrap\Bindings\Metal\Enums\KeyCode;
use Microscrap\Bindings\Metal\Enums\MouseButton;

/*
|--------------------------------------------------------------------------
| Metal Input helpers — 1:1 over ext-metal (Metal\MTL\Input) 0.7.3+
|--------------------------------------------------------------------------
| Helper names match the C ABI (mtl_input_*). Enums accepted where helpful.
*/

if (! function_exists('mtl_input_key_down')) {
    function mtl_input_key_down(KeyCode|int $keycode): bool
    {
        return Input::keyDown($keycode instanceof KeyCode ? $keycode->value : $keycode);
    }
}

if (! function_exists('mtl_input_mouse_button_down')) {
    function mtl_input_mouse_button_down(MouseButton|int $button): bool
    {
        return Input::mouseButtonDown($button instanceof MouseButton ? $button->value : $button);
    }
}

if (! function_exists('mtl_input_mouse_position')) {
    /**
     * @return array{0?: float, 1?: float}
     */
    function mtl_input_mouse_position(int $window = 0): array
    {
        return Input::mousePosition($window);
    }
}

if (! function_exists('mtl_input_mouse_scroll_delta')) {
    /**
     * @return array{0: float, 1: float}
     */
    function mtl_input_mouse_scroll_delta(): array
    {
        return Input::mouseScrollDelta();
    }
}

if (! function_exists('mtl_input_gamepad_count')) {
    function mtl_input_gamepad_count(): int
    {
        return Input::gamepadCount();
    }
}

if (! function_exists('mtl_input_gamepad_name')) {
    function mtl_input_gamepad_name(int $index): string
    {
        return Input::gamepadName($index);
    }
}

if (! function_exists('mtl_input_gamepad_button_down')) {
    function mtl_input_gamepad_button_down(int $index, GamepadButton|int $button): bool
    {
        return Input::gamepadButtonDown(
            $index,
            $button instanceof GamepadButton ? $button->value : $button
        );
    }
}

if (! function_exists('mtl_input_gamepad_axis')) {
    function mtl_input_gamepad_axis(int $index, GamepadAxis|int $axis): float
    {
        return Input::gamepadAxis(
            $index,
            $axis instanceof GamepadAxis ? $axis->value : $axis
        );
    }
}

if (! function_exists('mtl_input_gamepad_state')) {
    /**
     * @return array{name?: string, buttons?: list<int>, axes?: list<float>}
     */
    function mtl_input_gamepad_state(int $index): array
    {
        return Input::gamepadState($index);
    }
}
