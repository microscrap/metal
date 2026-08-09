<?php

namespace DeptOfScrapyardRobotics\Tests\Feature;

beforeEach(function (): void {
    if (! extension_loaded('metal')) {
        $this->markTestSkipped('ext-metal is not loaded');
    }
});

it('initializes the app and reports quit state via helpers', function (): void {
    expect(mtl_app_init())->toBeTrue();
    expect(mtl_app_should_quit())->toBeFalse();

    $device = mtl_device_create_system_default();
    expect($device)->toBeGreaterThan(0);
    expect(mtl_device_get_name($device))->toBeString()->not->toBeEmpty();
    mtl_device_release($device);
});
