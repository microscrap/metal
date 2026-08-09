<?php

namespace Microscrap\Bindings\Metal\Enums;

/**
 * Digital button indices for mtl_input_gamepad_button_down (ext-metal layout).
 */
enum GamepadButton: int
{
    case A = 0;
    case B = 1;
    case X = 2;
    case Y = 3;
    case LEFT_SHOULDER = 4;
    case RIGHT_SHOULDER = 5;
    case BACK = 6;
    case START = 7;
    case GUIDE = 8;
    case LEFT_THUMB = 9;
    case RIGHT_THUMB = 10;
    case DPAD_UP = 11;
    case DPAD_RIGHT = 12;
    case DPAD_DOWN = 13;
    case DPAD_LEFT = 14;
}
