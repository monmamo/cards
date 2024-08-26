<?php
namespace CardTypes;

abstract class SetupType implements \CardType {
    /**
     * 512x512 original.
     */
    public static function icon():?string{
        return null;
    }


    public static function standardRule(): \Traversable {
        yield "Can be played only during the Setup phase.";
    }

}
