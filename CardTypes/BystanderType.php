<?php

namespace CardTypes;

abstract class BystanderType implements \CardType {
    
    public static function title(): string {
        return 'Bystander';
    }

    public static function standardRule(): \Traversable {
        return new \EmptyIterator;
    }

    public static function background(): ?string {
        return null;
// <<<SVG
// SVG;
}
}