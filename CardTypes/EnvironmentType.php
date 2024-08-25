<?php

namespace CardTypes;

abstract class Environment implements \CardType {

    public static function title(): string {
        return 'Environment';
    }

    public static function standardRule(): \Traversable {
      return new \EmptyIterator;
    }

    public static function color():string|array{
        return 'dark green';
    }

    public static function icon(): ?string {
        return
<<<SVG
SVG;
    }

    public static function background(): ?string {
        return
<<<SVG
SVG;
}
}
