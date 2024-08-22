<?php

namespace CardTypes;

abstract class MonsterType implements \CardType {
    
    public static function title(): string {
        return 'Monster';
    }

    public static function standardRule(): \Traversable {
        return new \EmptyIterator;
    }

    public static function background(): ?string {
        return 
<<<SVG
SVG;
}
}