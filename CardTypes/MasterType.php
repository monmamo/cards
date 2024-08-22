<?php

namespace CardTypes;

abstract class MasterType implements \CardType {
    
    public static function title(): string {
        return 'Master';
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