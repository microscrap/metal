<?php

namespace DeptOfScrapyardRobotics\Tests\Support;

/**
 * Maps Metal\MTL\* camelCase methods to C ABI helper names (mtl_*).
 */
final class HelperNames
{
    /**
     * @var array<string, array<string, string>>
     */
    private const MAP = [
        'Metal\\MTL\\App' => [
            'init' => 'mtl_app_init',
            'poll' => 'mtl_app_poll',
            'run' => 'mtl_app_run',
            'terminate' => 'mtl_app_terminate',
            'shouldQuit' => 'mtl_app_should_quit',
            'resetQuit' => 'mtl_app_reset_quit',
        ],
        'Metal\\MTL\\Window' => [
            'create' => 'mtl_window_create',
            'destroy' => 'mtl_window_destroy',
            'setTitle' => 'mtl_window_set_title',
            'show' => 'mtl_window_show',
            'hide' => 'mtl_window_hide',
            'shouldClose' => 'mtl_window_should_close',
            'getWidth' => 'mtl_window_get_width',
            'getHeight' => 'mtl_window_get_height',
            'attachDevice' => 'mtl_window_attach_device',
            'getLayer' => 'mtl_window_get_layer',
            'clear' => 'mtl_window_clear',
            'getDevice' => 'mtl_window_get_device',
            'presentTexture' => 'mtl_window_present_texture',
        ],
        'Metal\\MTL\\Menu' => [
            'installDefault' => 'mtl_menu_install_default',
            'addItem' => 'mtl_menu_add_item',
            'pollAction' => 'mtl_menu_poll_action',
        ],
        'Metal\\MTL\\Device' => [
            'createSystemDefault' => 'mtl_device_create_system_default',
            'release' => 'mtl_device_release',
            'newCommandQueue' => 'mtl_device_new_command_queue',
            'releaseCommandQueue' => 'mtl_command_queue_release',
            'getName' => 'mtl_device_get_name',
        ],
        'Metal\\MTL\\Texture' => [
            'create' => 'mtl_texture_create_rgba8',
            'release' => 'mtl_texture_release',
            'getWidth' => 'mtl_texture_get_width',
            'getHeight' => 'mtl_texture_get_height',
            'clear' => 'mtl_texture_clear',
            'writePixel' => 'mtl_texture_write_pixel',
            'readPixel' => 'mtl_texture_read_pixel',
            'readPixels' => 'mtl_texture_read_rgba8',
        ],
        'Metal\\MTL\\Input' => [
            'keyDown' => 'mtl_input_key_down',
            'mouseButtonDown' => 'mtl_input_mouse_button_down',
            'mousePosition' => 'mtl_input_mouse_position',
            'mouseScrollDelta' => 'mtl_input_mouse_scroll_delta',
            'gamepadCount' => 'mtl_input_gamepad_count',
            'gamepadName' => 'mtl_input_gamepad_name',
            'gamepadButtonDown' => 'mtl_input_gamepad_button_down',
            'gamepadAxis' => 'mtl_input_gamepad_axis',
            'gamepadState' => 'mtl_input_gamepad_state',
        ],
    ];

    public static function for(string $extensionClass, string $method): string
    {
        if (! isset(self::MAP[$extensionClass][$method])) {
            throw new \InvalidArgumentException("No helper mapping for {$extensionClass}::{$method}");
        }

        return self::MAP[$extensionClass][$method];
    }
}
