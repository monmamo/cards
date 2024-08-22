<?php

interface CardType {
    public static function title():string;
    public static  function standardRule():\Traversable;
    public static  function background():?string;
}