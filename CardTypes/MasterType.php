<?php

namespace CardTypes;

abstract class MasterType implements \CardType
{

    use Concerns\Formatting;
    use Concerns\Character;
    public static function title(): string
    {
        return 'Master';
    }

    public static function standardRule(): \Traversable
    {
        return new \EmptyIterator;
    }

    public static function icon(): ?string
    {
        return
            <<<SVG
<path d="M192 24l-9.617 9.617c.586.598 1.085 1.276 1.484 2.012l72.596 130.67L328.11 35.673c.128-.237.266-.467.415-.692L320 24c-32 23.71-96 21.265-128 0zm-22.62 22.62L160 56c-16 0-48 16-64 32L16 248l80 48 48-112-9.158 87h64.195l47.195-86.05zm171.155 3.827L228.342 255H297v16h80.158L368 184l48 112 80-48-80-160c-13.322-12.132-48-32-71.154-32zM129.578 321l-9.982 94.84L171.613 321zm62.565 0l-76.868 135.88C114.277 458.763 112 488 112 488h288l-17.578-167h-79.86l48 96h-52.125L256 332.127 213.562 417h-52.087c15.955-32.003 31.827-64.05 47.884-96z" >
SVG;
    }

    public static function background(): ?string
    {
        return self::linearGradientBackground("#000000", "#4a4a4a") .
            <<<SVG
<g transform="translate(-150,0) scale(2.05078125)">
<path d="M192 24l-9.617 9.617c.586.598 1.085 1.276 1.484 2.012l72.596 130.67L328.11 35.673c.128-.237.266-.467.415-.692L320 24c-32 23.71-96 21.265-128 0zm-22.62 22.62L160 56c-16 0-48 16-64 32L16 248l80 48 48-112-9.158 87h64.195l47.195-86.05zm171.155 3.827L228.342 255H297v16h80.158L368 184l48 112 80-48-80-160c-13.322-12.132-48-32-71.154-32zM129.578 321l-9.982 94.84L171.613 321zm62.565 0l-76.868 135.88C114.277 458.763 112 488 112 488h288l-17.578-167h-79.86l48 96h-52.125L256 332.127 213.562 417h-52.087c15.955-32.003 31.827-64.05 47.884-96z" fill="#006000" fill-opacity="0.75"></path>
</g>
SVG;
    }
}
