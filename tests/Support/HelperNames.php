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
    ];

    public static function for(string $extensionClass, string $method): string
    {
        if (! isset(self::MAP[$extensionClass][$method])) {
            throw new \InvalidArgumentException("No helper mapping for {$extensionClass}::{$method}");
        }

        return self::MAP[$extensionClass][$method];
    }
}
