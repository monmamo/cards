<?php

namespace CardTypes\Concerns;

trait GameAction
{
    public static function color(): string|array
    {
        return 'green';
    }


    protected static function linearGradientBackground(): string
    {
        return
            <<<SVG
<defs><linearGradient x1="0" x2="1" y1="1" y2="0" id="background-gradient"><stop offset="0%" stop-color="#036153" stop-opacity="1"></stop><stop offset="100%" stop-color="#7CB3AB" stop-opacity="1"></stop></linearGradient></defs>
<path d="M0 0h750v1050H0z" fill="url(#background-gradient)"></path>
SVG;
    }
}
