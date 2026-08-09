<?php

namespace Microscrap\Bindings\Metal\Enums;

/**
 * Axis indices for mtl_input_gamepad_axis.
 * Sticks are -1..1 (Y up positive); triggers are 0..1.
 */
enum GamepadAxis: int
{
    case LEFT_X = 0;
    case LEFT_Y = 1;
    case RIGHT_X = 2;
    case RIGHT_Y = 3;
    case LEFT_TRIGGER = 4;
    case RIGHT_TRIGGER = 5;
}
