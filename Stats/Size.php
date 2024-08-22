<?php
namespace Stats;

abstract class Size implements \Stat {
    /**
     * 512x512 original.
     */
    public static function icon():?string{
        return <<<SVG
<path d="M64 64v128l48-48 48 48 32-32-48-48 48-48H64zm256 0l48 48-48 48 32 32 48-48 48 48V64H320zM64 320v128h128l-48-48 48-48-32-32-48 48-48-48zm288 0l-32 32 48 48-48 48h128V320l-48 48-48-48z" ></path>
SVG;
    }

}
