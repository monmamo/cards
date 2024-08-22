<?php

namespace CardTypes;

abstract class DroneType implements \CardType
{

    public static function title(): string
    {
        return 'Drone';
    }
    public static function color(): string|array
    {
        return 'black';
    }


    public static function standardRule(): \Traversable
    {
        yield "Item";
        yield "While on the Battlefield, counts as a Flying Monster. Cannot attack. Can use Dodge.";
    }

    public static function icon(): ?string
    {
        return null;
        // <<<SVG
        // SVG;
    }

    public static function background(): ?string
    {
        return
            <<<SVG
SVG;
    }
}
