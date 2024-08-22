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
        return 'black';
    }

    public static function icon(): ?string {
        return null;
// <<<SVG
// SVG;
    }

    public static function background(): ?string {
        return
<<<SVG
SVG;
}
}
