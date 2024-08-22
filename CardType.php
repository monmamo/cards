<?php

interface CardType {
    /**
     * 512x512 original.
     */
    public static function icon():?string;
    public static function title():string;
    public static  function standardRule():\Traversable;
    public static  function background():?string;
    public static function color():string|array;
}
