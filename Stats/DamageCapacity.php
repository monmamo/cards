<?php
namespace Stats;

abstract class DamageCapacity implements \Stat {
    /**
     * 512x512 original.
     */
    public static function icon():?string{
        return <<<SVG
<path d="M196 16a30 30 0 0 0-30 30v120H46a30 30 0 0 0-30 30v120a30 30 0 0 0 30 30h120v120a30 30 0 0 0 30 30h120a30 30 0 0 0 30-30V346h120a30 30 0 0 0 30-30V196a30 30 0 0 0-30-30H346V46a30 30 0 0 0-30-30H196z" ></path>
SVG;
    }

}
