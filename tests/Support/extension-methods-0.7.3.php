<?php

/**
 * Frozen ext-metal 0.7.3 public static surfaces that microscrap/metal must wrap.
 *
 * @return array<string, list<string>>
 */
return [
    'Metal\\MTL\\App' => [
        'init',
        'poll',
        'run',
        'terminate',
        'shouldQuit',
        'resetQuit',
    ],
    'Metal\\MTL\\Window' => [
        'create',
        'destroy',
        'setTitle',
        'show',
        'hide',
        'shouldClose',
        'getWidth',
        'getHeight',
        'attachDevice',
        'getLayer',
        'clear',
        'getDevice',
        'presentTexture',
    ],
    'Metal\\MTL\\Menu' => [
        'installDefault',
        'addItem',
        'pollAction',
    ],
    'Metal\\MTL\\Device' => [
        'createSystemDefault',
        'release',
        'newCommandQueue',
        'releaseCommandQueue',
        'getName',
    ],
    'Metal\\MTL\\Texture' => [
        'create',
        'release',
        'getWidth',
        'getHeight',
        'clear',
        'writePixel',
        'readPixel',
        'readPixels',
    ],
    'Metal\\MTL\\Input' => [
        'keyDown',
        'mouseButtonDown',
        'mousePosition',
        'mouseScrollDelta',
        'gamepadCount',
        'gamepadName',
        'gamepadButtonDown',
        'gamepadAxis',
        'gamepadState',
    ],
];
