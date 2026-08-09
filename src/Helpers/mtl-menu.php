<?php

use Metal\MTL\Menu;

/*
|--------------------------------------------------------------------------
| Metal Menu helpers — 1:1 over ext-metal (Metal\MTL\Menu)
|--------------------------------------------------------------------------
| Helper names match the C ABI (mtl_menu_*).
*/

if (! function_exists('mtl_menu_install_default')) {
    function mtl_menu_install_default(string $appName): bool
    {
        return Menu::installDefault($appName);
    }
}

if (! function_exists('mtl_menu_add_item')) {
    function mtl_menu_add_item(string $menuTitle, string $itemTitle, string $keyEquivalent, string $actionId): bool
    {
        return Menu::addItem($menuTitle, $itemTitle, $keyEquivalent, $actionId);
    }
}

if (! function_exists('mtl_menu_poll_action')) {
    function mtl_menu_poll_action(): string
    {
        return Menu::pollAction();
    }
}
