<?php

namespace CardTypes\Concerns;

trait Formatting
{

    protected static function linearGradientBackground($start, $end): string
    {
        return
            <<<SVG
<defs><linearGradient x1="0" x2="1" y1="1" y2="0" id="background-gradient"><stop offset="0%" stop-color="$start" stop-opacity="1"></stop><stop offset="100%" stop-color="$end" stop-opacity="1"></stop></linearGradient></defs>
<path d="M0 0h750v1050H0z" fill="url(#background-gradient)"></path>
SVG;
    }
}
