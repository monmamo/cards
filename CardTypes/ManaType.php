<?php

namespace CardTypes;

abstract class ManaType implements \CardType {
    
    public static function title(): string {
        return 'Mana';
    }

    public static function standardRule(): \Traversable {
        return new \EmptyIterator;
    }

    public static function background(): ?string {
        return null;
//         return 
// <<<SVG
// SVG;
}
}