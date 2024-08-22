<?php

namespace CardTypes;

abstract class UpkeepType implements \CardType {
    
    public static function title(): string {
        return 'Upkeep';
    }

    public static function standardRule(): \Traversable {
        return new \EmptyIterator;
    }

    /**
     * 512x512 original.
     */
    public static function titleIcon(): ?string {
        return 
<<<SVG
<g transform="translate(-150,0) scale(2.05078125)" style=""><path d="M0 0h512v512H0z" fill="url(#faithtoken-card-draw-gradient-0)"></path><path d="M331.188 16.72c-40.712-.002-81.41 15.408-112.438 46.436-43.866 43.864-56.798 107-38.813 162.25L17.03 388.312v25.75l170.22-170.218c2.75 5.84 5.847 11.555 9.344 17.094L17.03 440.5v51.78H64l181.875-181.874c5.516 3.515 11.212 6.668 17.03 9.438L90.44 492.28h27.03l164.75-164.75c55.182 17.85 118.21 4.884 162-38.905 41.415-41.414 54.998-99.91 41.282-152.813L380.22 241.125l-90.033-23.938-23.968-90.03L371.53 21.843c-13.213-3.41-26.772-5.125-40.342-5.125z" fill="#7CB3AB" fill-opacity="1"></path></g>
SVG;
    }

    public static function background(): ?string {
        return 
<<<SVG
<defs><linearGradient x1="0" x2="1" y1="1" y2="0" id="faithtoken-card-draw-gradient-0"><stop offset="0%" stop-color="#036153" stop-opacity="1"></stop><stop offset="100%" stop-color="#7CB3AB" stop-opacity="1"></stop></linearGradient></defs>
<g transform="translate(-150,0) scale(2.05078125)" style=""><path d="M0 0h512v512H0z" fill="url(#faithtoken-card-draw-gradient-0)"></path><path d="M331.188 16.72c-40.712-.002-81.41 15.408-112.438 46.436-43.866 43.864-56.798 107-38.813 162.25L17.03 388.312v25.75l170.22-170.218c2.75 5.84 5.847 11.555 9.344 17.094L17.03 440.5v51.78H64l181.875-181.874c5.516 3.515 11.212 6.668 17.03 9.438L90.44 492.28h27.03l164.75-164.75c55.182 17.85 118.21 4.884 162-38.905 41.415-41.414 54.998-99.91 41.282-152.813L380.22 241.125l-90.033-23.938-23.968-90.03L371.53 21.843c-13.213-3.41-26.772-5.125-40.342-5.125z" fill="#7CB3AB" fill-opacity="1"></path></g>
SVG;
}
}