<?php

namespace DeptOfScrapyardRobotics\Tests\Unit;

use DeptOfScrapyardRobotics\Tests\Support\HelperNames;

/**
 * Ensures every ext-metal 0.7.3 static has a microscrap C-ABI helper.
 */
function metalHelperFunctionNames(): array
{
    $names = [];
    foreach (['mtl-app.php', 'mtl-window.php', 'mtl-menu.php', 'mtl-device.php', 'mtl-texture.php', 'mtl-input.php'] as $file) {
        $source = file_get_contents(dirname(__DIR__, 2).'/src/Helpers/'.$file);
        preg_match_all("/function_exists\\('([^']+)'\\)/", $source, $matches);
        foreach ($matches[1] as $name) {
            $names[] = $name;
        }
    }

    return $names;
}

it('wraps every Metal\\MTL method with its C ABI helper name', function (): void {
    $map = require dirname(__DIR__).'/Support/extension-methods-0.7.3.php';
    $helpers = metalHelperFunctionNames();

    $expected = [];
    foreach ($map as $extensionClass => $methods) {
        foreach ($methods as $method) {
            $helper = HelperNames::for($extensionClass, $method);
            $expected[] = $helper;
            expect(in_array($helper, $helpers, true))->toBeTrue(
                "Missing helper for {$extensionClass}::{$method} (expected {$helper})"
            );
        }
    }

    sort($helpers);
    sort($expected);
    expect($helpers)->toBe($expected);
});

it('optionally mirrors live extension reflection when ext-metal is loaded', function (): void {
    if (! extension_loaded('metal')) {
        expect(true)->toBeTrue();

        return;
    }

    $map = require dirname(__DIR__).'/Support/extension-methods-0.7.3.php';

    foreach ($map as $extensionClass => $expectedMethods) {
        $ref = new \ReflectionClass($extensionClass);
        $live = [];
        foreach ($ref->getMethods(\ReflectionMethod::IS_STATIC | \ReflectionMethod::IS_PUBLIC) as $method) {
            if ($method->getDeclaringClass()->getName() === $extensionClass) {
                $live[] = $method->getName();
            }
        }
        sort($live);
        $expected = $expectedMethods;
        sort($expected);
        expect($live)->toBe($expected, "Live surface drift for {$extensionClass}");
    }
});
