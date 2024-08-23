<?php
require 'init.php';


$id = $_GET['id'];

$jsonFiles = glob("decks/{$id}.json");
if (count($jsonFiles) === 0) {
    die("Deck $card_id not found.");
}

$data = json_decode(file_get_contents($jsonFiles[0]), true);

if ($data === null) {
    die("Error decoding JSON for deck $card_id from file $jsonFiles[0].");
}


extract($data);

$total_count = 0;

?>
<ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
    <?php
    foreach ($cards as $card_id => $count) {
        $total_count += $count;
        $card_info = get_card_data(card_id:$card_id);
    ?>
        <li><a href="#" class="card-link link-body-emphasis d-inline-flex text-decoration-none rounded" data-id="<?= $card_id ?>"><?= $count ?> <?= $card_id ?> <?= $card_info->name ?? '' ?> </a></li>
    <?php } ?>
    <li>Total count <?= $total_count ?></li>
</ul>
<?
