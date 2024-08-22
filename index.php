<?php
require 'init.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<style>
    body {
        display: flex;
        height: 100vh;
        margin: 0;
    }

    #left-section {
        width: 100px;
        background-color: #f4f4f4;
        padding: 10px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    #right-section {
        flex-grow: 1;
        padding: 20px;
    }

    a {
        display: block;
        margin-bottom: 10px;
        color: #333;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }
</style>
</head>

<?php
function echo_section_for_set(\CardSet $set)
{
?>
    <li class="mb-1">
        <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#<?= $set->value ?>-collapse" aria-expanded="false">
            <?= sprintf('%s (%s)', $set->name, $set->value) ?>
        </button>
        <div class="collapse" id="<?= $set->value ?>-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                <?php
                foreach (iterate_cards(set: $set) as $card_id) {
                ?>
                    <li><a href="#" class="card-link link-body-emphasis d-inline-flex text-decoration-none rounded" data-id="<?= $card_id ?>"><?= $card_id ?></a></li>
                <?php } ?>
            </ul>
        </div>
    </li>
<?php
}
?>


<body>
    <div class="flex-shrink-0 p-3" style="width: 280px;" id="id-section">
        <?php
        echo_section_for_set(\CardSet::Base);
        echo_section_for_set(\CardSet::Masters);
        echo_section_for_set(\CardSet::Mobsters);
        echo_section_for_set(\CardSet::FirstAid);
        ?>
    </div>
    <div id="right-section">
        <p>Select a link from the left to load content here.</p>
    </div>

    <script>
var contentId = null;

async function load(contentId){
    if (!contentId && contentId === '') throw 'Invalid contentId';

    const response = await fetch(`show.php?card_id=${contentId}`);

if (!response.ok) {
    throw new Error(`Response status: ${response.status}`);
}

const rightSection = document.getElementById('right-section');
rightSection.innerHTML = await response.text();

}

        document.querySelectorAll('.card-link').forEach(link => {
            link.addEventListener('click', async function(event) {
                event.preventDefault();
                 await load(contentId = this.getAttribute('data-id'));
            });
        });

        document.querySelectorAll('#right-section').forEach(div => {
            div.addEventListener('dblclick', async function(event) {
                event.preventDefault();
                 await load(contentId);
            });
        });
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>