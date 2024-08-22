<?php

namespace CardTypes;

abstract class FacilityType implements \CardType {
    
    public static function title(): string {
        return 'Facility';
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