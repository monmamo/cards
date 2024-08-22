<?php

namespace CardTypes;

abstract class MonsterType implements \CardType {

    public static function title(): string {
        return 'Monster';
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
