<?php

namespace CardTypes;

abstract class FacilityType implements \CardType {

    public static function title(): string {
        return 'Facility';
    }
    public static function color():string|array{
        return 'black';
    }

    public static function standardRule(): \Traversable {
        return new \EmptyIterator;
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
