<?php

namespace CardTypes;

abstract class CatastropheType implements \CardType
{

    use Concerns\Calamitous;
    use Concerns\Formatting;

    public static function title(): string
    {
        return 'Catastrophe';
    }

    public static function standardRule(): \Traversable
    {
        yield "Must be first card played in player’s turn.";
        yield "Only one Catastrophe card may be played during any game.";
        yield "Place this card in the center of the Battlefield.";
    }

    public static function icon(): ?string
    {
        return
            <<<SVG
<path d="M328.547 19.115c-30.61 99.22-47.583 151.205-86.88 156.778-18.626 2.642-42.988-19.225-70.16-50.29 15.47 30.702 21.275 55.265 10.845 61.348-15.787 9.21-51.095-6.94-106.815-30.837 31.653 20.827 83.667 50.18 77.358 58.63-8.074 10.81-77.23-4.706-130.866-13.163 89.224 25.398 137.61 55.572 137.61 82.387 0 18.423-48.845 62.18-71.888 83.928 19.558-11.397 64.736-24.44 76.777-2.99 13.335 23.758-6.577 61.6-28.5 128.027 31.39-46.19 73.363-108.122 90.734-106.49 12.248 1.15-4.805 60.692-10.47 98.71 21.547-80.082 46.534-132.5 90.153-131.015 29.665 1.01 58.022 30.762 88.99 52.047-16.188-19.81-45.975-47.99-39.55-53.243 8.9-7.276 56.48 12.547 94.224 25.726-24.982-17.962-68.644-43.88-61.653-50.852 10.417-10.387 72.436 1.332 117.49 7.178-87.746-30.728-136.846-44.187-147.33-78.533-5.283-17.31 10.853-40.3 40.89-68.038-31.377 17.197-54.588 28.694-63.737 12.392-11.576-20.622 11.374-65.883 35.238-126.06-21.135 32.47-48.532 83.487-55.254 77.174-8.972-8.425 5.598-77.597 12.795-132.813h-.003zM20.45 19.27v23.36c48.52 27.437 95.253 62.39 141.333 102.786-33.768-41.685-67.34-83.79-94.025-126.146H20.45zm175.79 0c18.465 37.356 34.503 76.96 48.475 117.97-5.007-39.79-9.898-79.367-12.264-117.97h-36.21zm160.022 0c-7.18 26.672-15.416 53.437-25.116 80.593 15.405-27.34 30.698-54.514 46.723-80.593H356.26zm105.123 0c-27.895 50.718-63.73 99.873-105.707 147.755 46.514-37.68 92.9-75.343 140.164-103.37V19.27h-34.457zm34.455 160.02c-36.077 17.98-74.843 34.036-115.635 47.89 38.908-6.17 77.882-12.105 115.635-15.77v-32.12zm-206.266 42.868c9.35 0 16.93 7.58 16.93 16.932 0 9.35-7.58 16.93-16.93 16.93s-16.93-7.58-16.93-16.93 7.58-16.932 16.93-16.932zm-52.06 1.598c15.508 0 28.082 12.57 28.082 28.08 0 9.718-4.938 18.28-12.44 23.322 3.614 3.843 5.842 9.002 5.842 14.694 0 11.86-9.613 21.474-21.473 21.474s-21.474-9.615-21.474-21.474c0-5.687 2.228-10.842 5.837-14.684-7.51-5.04-12.453-13.608-12.453-23.332 0-15.51 12.57-28.08 28.08-28.08zM20.45 235.078v38.547c31.87-4.584 64.46-5.693 97.532-4.09-33.727-10.19-67.407-20.35-97.53-34.457zm265.82 28.377c9.35 0 16.93 7.58 16.93 16.932 0 9.35-7.58 16.93-16.93 16.93s-16.932-7.58-16.932-16.93 7.58-16.932 16.932-16.932zM128.494 295.05c-36.153 11.99-72.24 20.293-108.043 24.313v51.393c30.994-28.64 69.426-52.264 108.044-75.703v-.002zm5.84 88.645c-37.923 30.72-75.607 61.482-113.885 87.02v23.943h29.784c24.02-37.76 52.365-74.765 84.1-110.963zm202.07 11.096c26.807 33.093 53.226 66.414 76.508 99.87h59.568c-46.586-27.078-91.877-61.12-136.074-99.87h-.002zm-52.562 9.93c-3.175 30.26-6.39 60.5-10.512 89.94h20.44c-4.51-29.083-7.904-59.17-9.926-89.94h-.002zm26.865 13.432c11.346 25.473 22.374 51.18 32.705 76.508h23.36c-19.395-23.9-38.105-49.64-56.065-76.508z" ></path>
SVG;
    }

    public static function background(): ?string
    {
        return self::linearGradientBackground("#3c2600", "#b57200") .
            <<<SVG
<g transform="translate(-175,-50) scale(2.25)" style="">
<path d="M328.547 19.115c-30.61 99.22-47.583 151.205-86.88 156.778-18.626 2.642-42.988-19.225-70.16-50.29 15.47 30.702 21.275 55.265 10.845 61.348-15.787 9.21-51.095-6.94-106.815-30.837 31.653 20.827 83.667 50.18 77.358 58.63-8.074 10.81-77.23-4.706-130.866-13.163 89.224 25.398 137.61 55.572 137.61 82.387 0 18.423-48.845 62.18-71.888 83.928 19.558-11.397 64.736-24.44 76.777-2.99 13.335 23.758-6.577 61.6-28.5 128.027 31.39-46.19 73.363-108.122 90.734-106.49 12.248 1.15-4.805 60.692-10.47 98.71 21.547-80.082 46.534-132.5 90.153-131.015 29.665 1.01 58.022 30.762 88.99 52.047-16.188-19.81-45.975-47.99-39.55-53.243 8.9-7.276 56.48 12.547 94.224 25.726-24.982-17.962-68.644-43.88-61.653-50.852 10.417-10.387 72.436 1.332 117.49 7.178-87.746-30.728-136.846-44.187-147.33-78.533-5.283-17.31 10.853-40.3 40.89-68.038-31.377 17.197-54.588 28.694-63.737 12.392-11.576-20.622 11.374-65.883 35.238-126.06-21.135 32.47-48.532 83.487-55.254 77.174-8.972-8.425 5.598-77.597 12.795-132.813h-.003zM20.45 19.27v23.36c48.52 27.437 95.253 62.39 141.333 102.786-33.768-41.685-67.34-83.79-94.025-126.146H20.45zm175.79 0c18.465 37.356 34.503 76.96 48.475 117.97-5.007-39.79-9.898-79.367-12.264-117.97h-36.21zm160.022 0c-7.18 26.672-15.416 53.437-25.116 80.593 15.405-27.34 30.698-54.514 46.723-80.593H356.26zm105.123 0c-27.895 50.718-63.73 99.873-105.707 147.755 46.514-37.68 92.9-75.343 140.164-103.37V19.27h-34.457zm34.455 160.02c-36.077 17.98-74.843 34.036-115.635 47.89 38.908-6.17 77.882-12.105 115.635-15.77v-32.12zm-206.266 42.868c9.35 0 16.93 7.58 16.93 16.932 0 9.35-7.58 16.93-16.93 16.93s-16.93-7.58-16.93-16.93 7.58-16.932 16.93-16.932zm-52.06 1.598c15.508 0 28.082 12.57 28.082 28.08 0 9.718-4.938 18.28-12.44 23.322 3.614 3.843 5.842 9.002 5.842 14.694 0 11.86-9.613 21.474-21.473 21.474s-21.474-9.615-21.474-21.474c0-5.687 2.228-10.842 5.837-14.684-7.51-5.04-12.453-13.608-12.453-23.332 0-15.51 12.57-28.08 28.08-28.08zM20.45 235.078v38.547c31.87-4.584 64.46-5.693 97.532-4.09-33.727-10.19-67.407-20.35-97.53-34.457zm265.82 28.377c9.35 0 16.93 7.58 16.93 16.932 0 9.35-7.58 16.93-16.93 16.93s-16.932-7.58-16.932-16.93 7.58-16.932 16.932-16.932zM128.494 295.05c-36.153 11.99-72.24 20.293-108.043 24.313v51.393c30.994-28.64 69.426-52.264 108.044-75.703v-.002zm5.84 88.645c-37.923 30.72-75.607 61.482-113.885 87.02v23.943h29.784c24.02-37.76 52.365-74.765 84.1-110.963zm202.07 11.096c26.807 33.093 53.226 66.414 76.508 99.87h59.568c-46.586-27.078-91.877-61.12-136.074-99.87h-.002zm-52.562 9.93c-3.175 30.26-6.39 60.5-10.512 89.94h20.44c-4.51-29.083-7.904-59.17-9.926-89.94h-.002zm26.865 13.432c11.346 25.473 22.374 51.18 32.705 76.508h23.36c-19.395-23.9-38.105-49.64-56.065-76.508z" fill="#b57204" fill-opacity="1"></path></g>
SVG;
    }
}
