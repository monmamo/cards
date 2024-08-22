<?php

namespace CardTypes;

abstract class VenueType implements \CardType {
    
    public static function title(): string {
        return 'Venue';
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