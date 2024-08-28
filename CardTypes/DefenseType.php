<?php

namespace CardTypes;

abstract class DefenseType implements \CardType {

    public static function title(): string {
        return 'Defense';
    }

    public static function standardRule(): \Traversable {
        yield "Can be played only as a response to an Attack.";
    }
    public static function color():string|array{
        return 'blue';
    }

    public static function icon(): ?string {
        return
<<<SVG
<path d="M80 32c-64 256 48 416 176 464 128-48 240-208 176-464-112 32-240 32-352 0z"></path>
SVG;
    }

    public static function background(): ?string {
        return
<<<SVG
<defs><linearGradient x1="0" x2="1" y1="1" y2="0" id="trait-gradient"><stop offset="0%" stop-color="#254871" stop-opacity="1"></stop><stop offset="100%" stop-color="#4A90E2" stop-opacity="1"></stop></linearGradient></defs>
<path d="M0 0h750v1050H0z" fill="url(#trait-gradient)"></path>
SVG;
}
}
