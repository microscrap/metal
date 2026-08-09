<?php

namespace Microscrap\Bindings\Metal\Enums;

/**
 * NSEvent pressedMouseButtons bit indices for mtl_input_mouse_button_down.
 */
enum MouseButton: int
{
    case LEFT = 0;
    case RIGHT = 1;
    case MIDDLE = 2;
}
