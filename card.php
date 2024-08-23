<?php
$jsonFiles = glob("specs/*/{$card_id}.json");
if (count($jsonFiles) === 0) {
    die("Card $card_id not found.");
}

$data = json_decode(file_get_contents($jsonFiles[0]), true);

if ($data === null) {
    die("Error decoding JSON for card $card_id from file $jsonFiles[0].");
}

extract($data);

$card_type_fqn = "\\CardTypes\\{$card_type}Type";

$image = match (true) {
    !isset($image) => new \stdClass(),
    is_object($image) => $image,
    is_array($image) => (object) $image,
    is_string($image) => (object) ['filename' => $image],
    is_null($image) => new \stdClass(),
};

$image_encoded = match (true) {
    isset($image->filename) =>   base64_encode(file_get_contents("images/{$image->filename}")),
    default => null,
};

$image_credit = match (true) {
    isset($image->ai) && $image->ai => "Generated image",
    !isset($image->credit) => null,
    default => "Image by " . $image->credit,
};

$colors = match (true) {
    !isset($colors) => new \stdClass(),
    is_object($colors) => $colors,
    is_array($colors) => (object) $colors,
    is_string($colors) => (object) ['credits' => $colors, "flavor_text" => $colors],
    is_null($colors) => new \stdClass(),
};

header("Content-Type: image/svg+xml");
?>

<svg width="750" height="1050" viewBox="0 0 750 1050" xmlns="http://www.w3.org/2000/svg">

    <title><?= $name ?></title>

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Roboto");
        @import url("https://fonts.googleapis.com/css2?family=Roboto+Condensed");

        text {
            font-family: 'Roboto', sans-serif;
        }

        .credit {
            font-style: normal;
            font-size: 20px;
            fill: <?= $colors->credits ?? 'white' ?>;
        }

        .flavor {
            font-style: italic;
            font-size: 25px;
            white-space: normal;
            fill: <?= $colors->flavor_text ?? 'white' ?>;
        }


        tspan.bodytext {
            font-style: normal;
            font-size: 30px;
            font-weight: 400;
            font-style: normal;
            text-align: center;
            text-anchor: middle;
            white-space: normal;
            fill: black;
            margin: 5px;
        }



        tspan.smallrule {
            font-style: normal;
            font-size: 20px;
            font-weight: 400;
            font-style: normal;
            white-space: normal;
            text-align: center;
            text-anchor: middle;
            fill: black;

        }

        .cardtype {
            font-style: normal;
            font-size: 30px;
            font-weight: 500;
            font-style: normal;
            fill: black;

        }

        .cardname {
            font-family: 'Roboto Condensed';
            font-style: normal;
            font-size: 50px;
            font-weight: 500;
            font-style: normal;
            fill: black;
        }

        image.hero {
            position: relative;
            display: block;
            text-align: center;
            height: 450px;
        }
    </style>

    <defs>
        <filter x="-5%" y="-5%" width="110%" height="110%" id="solid">
            <feFlood flood-color="white" flood-opacity="85%" result="bg" />
            <feMerge>
                <feMergeNode in="bg" />
                <feMergeNode in="SourceGraphic" />
            </feMerge>
        </filter>
    </defs>

    <rect x="0" y="0" width="750" height="1050" fill="#000000" />

    <?php
    $default_background = <<<SVG
<text id="MON-MA-MO" xml:space="preserve">
<tspan x="50%" y="440" font-family="Roboto" text-anchor="middle"  font-size="265" font-weight="700" fill="#333333" xml:space="preserve">MON</tspan>
<tspan x="50%" y="657.7" font-family="Roboto" text-anchor="middle"  font-size="265" font-weight="700" fill="#333333" xml:space="preserve">MA</tspan>
<tspan x="50%" y="875.4" font-family="Roboto"  text-anchor="middle"  font-size="265" font-weight="700" fill="#333333" xml:space="preserve">MO</tspan>
</text>
SVG;

    echo match (true) {
        $image->fullsize ?? false => "<image href=\"data:image/jpg;base64,$image_encoded\" />",
        default => $card_type_fqn::background() ?? $default_background
    };
    ?>

    <text x="375" y="45" class="credit" text-anchor="middle" alignment-baseline="bottom"><?= $image_credit ?></text>

    <svg id="main" x="50" y="50" width="650" height="950" viewBox="0 0 650 950">


        <?php
        echo match (true) {
            !is_null($image_encoded) && !($image->fullsize ?? false) => "<image width=\"650\" height=\"450\" href=\"data:image/jpg;base64,$image_encoded\" />",
            default => ''
        };

        $stats_recognized = [
            'integrity' =>  \Stats\Integrity::class,
            'damage_capacity' =>  \Stats\DamageCapacity::class,
            'level' =>  \Stats\Level::class,
            'size' =>  \Stats\Size::class,
            'speed' =>  \Stats\Speed::class,
        ];


        $stats_found = [];
        foreach ($stats_recognized as $slug => $fqn) {
            if (isset($$slug)) {
                $stats_found[] = [$$slug, $fqn];
            }
        }
        foreach ($functions ?? [] as $name) {
                $stats_found[] = [$name, "\\Stats\\{$name}"];
        }

        define('STAT_ICON_HEIGHT', 54);
        ?>
        <rect width="54" height="<?= STAT_ICON_HEIGHT * count($stats_found) ?>" fill="#FFFFFF" fill-opacity="85%"/>
        <?php

        foreach ($stats_found as $index => $data) {
            list($value, $fqn) = $data;
        ?>
            <g transform="translate(2,<?= STAT_ICON_HEIGHT *$index+2 ?>) scale(0.09375)" fill="#000000" fill-opacity="1"><?= $fqn::icon() ?></g>
            <text x="55" y="<?= STAT_ICON_HEIGHT * $index+2 ?>" dy="27" font-size="40px" text-anchor="left" alignment-baseline="middle" filter="url(#solid)"><?= $value ?></text>

        <?php
        }
        ?>

        <g>

            <text x="50%" y="475" width="100%" height="auto" text-anchor="middle">
                <tspan x="50%" class="flavor" alignment-baseline="top"><?= $flavor_text ?? null ?></tspan>
            </text>

            <text x="50%" y="495" width="100%" height="auto" filter="url(#solid)">
                <?php
                $stats ??= [];

                if (count($stats) > 0) {
                    echo "<tspan x=\"50%\"  dy=\"35\" width=\"100%\"  class=\"smallrule\">" . implode(' ・ ', $stats) . "</tspan>";
                }
                ?>


                <?php

                foreach ($card_type_fqn::standardRule() as $line) {
                    echo "<tspan x=\"50%\" dy=\"25\" width=\"100%\" class=\"smallrule\">{$line}</tspan>";
                }

                if (is_string($body_text) && !empty($body_text)) {
                    echo "<tspan x=\"50%\"  dy=\"35\" width=\"100%\"  class=\"bodytext\">{$body_text}</tspan>";
                }
                if (is_array($body_text)) {
                    foreach ($body_text as $line) {
                        echo "<tspan x=\"50%\"  dy=\"35\" width=\"100%\"  class=\"bodytext\">{$line}</tspan>";
                    }
                }
                ?>
            </text>

            <?php if (!isset($transparent_name_background) || !$transparent_name_background) { ?>
                <rect y="810" width="650" height="140" fill="#FFFFFF" />
            <?php }

            $icon = $card_type_fqn::icon();
            $text_x = is_string($icon) ? 395 : 325;

            if (is_string($icon)) {
            ?>
                <svg id="card-type-icon" x="6" y="816" width="128" height="128" viewBox="0 0 128 128">
                    <g transform="scale(0.25)" fill="#000000" fill-opacity="1">
                        <?= $card_type_fqn::icon() ?>
                    </g>
                </svg>
            <?php
            }
            ?>

            <text x="<?= $text_x ?>" y="850" text-anchor="middle" class="cardtype" alignment-baseline="middle"><?= strtoupper($card_type) ?></text>
            <text x="<?= $text_x ?>" y="920" text-anchor="middle" class="cardname" alignment-baseline="bottom"><?= $name ?></text>

        </g>
    </svg>

    <text x="2.5%" y="97.5%" class="credit" text-anchor="start" alignment-baseline="top">&#169; Monsters Masters &amp; Mobsters LLC</text>
    <text x="70%" y="97.5%" class="credit" text-anchor="middle" alignment-baseline="top"><?= date('Y-m-d') ?></text>
    <text x="97.5%" y="97.5%" class="credit" text-anchor="end" alignment-baseline="top"><?= $card_id ?></text>
</svg>
