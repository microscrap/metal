<?php

use Metal\MTL\Device;

/*
|--------------------------------------------------------------------------
| Metal Device helpers — 1:1 over ext-metal (Metal\MTL\Device)
|--------------------------------------------------------------------------
| Helper names match the C ABI (mtl_device_* / mtl_command_queue_*).
| Opaque device/queue ints pass through unchanged.
*/

if (! function_exists('mtl_device_create_system_default')) {
    function mtl_device_create_system_default(): int
    {
        return Device::createSystemDefault();
    }
}

if (! function_exists('mtl_device_release')) {
    function mtl_device_release(int $device): void
    {
        Device::release($device);
    }
}

if (! function_exists('mtl_device_new_command_queue')) {
    function mtl_device_new_command_queue(int $device): int
    {
        return Device::newCommandQueue($device);
    }
}

if (! function_exists('mtl_command_queue_release')) {
    function mtl_command_queue_release(int $queue): void
    {
        Device::releaseCommandQueue($queue);
    }
}

if (! function_exists('mtl_device_get_name')) {
    function mtl_device_get_name(int $device): string
    {
        return Device::getName($device);
    }
}
