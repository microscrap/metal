<?php

/**
 * Frozen ext-metal 0.7.0 public static surfaces that microscrap/metal must wrap.
 *
 * Keys are Metal\MTL\* FQCN strings. Values are extension method names.
 * Helper names are the C ABI snake_case forms (see HelperNames / CoverageTest).
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
];
