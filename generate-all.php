<?php
require 'init.php';


// Get all .json files in the current directory
$jsonFiles = glob('specs/*/*.json');

// Iterate through each .json file
foreach ($jsonFiles as $file) {

    if ($file[0] === '_') {
        continue;
    }
    $card_id = pathinfo($file, PATHINFO_FILENAME);
    ob_start(); // Start output buffering
    require 'card.php'; // Include the card.php file
    $svgContent = ob_get_contents(); // Get the contents of the output buffer
    ob_end_clean(); // Clean (erase) the output buffer and turn off output buffering
    $path = "output/{$card_id}.svg";
    file_put_contents($path, $svgContent);
    echo $path . PHP_EOL;
}
