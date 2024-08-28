<?php

namespace CardTypes;

abstract class FacilityType extends PlaceType {

    public static function title(): string {
        return 'Facility';
    }
    public static function color():string|array{
        return 'black';
    }

    public static function standardRule(): \Traversable {
        return new \EmptyIterator;
    }

}
