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
    <script src="https://unpkg.com/htmx.org@2.0.2"></script>
</head>

<style>
    body {
        display: flex;
        margin: 0;
        height: 1050px;
        padding-top: 4.5rem;

    }

    #left-section {
        background-color: #f4f4f4;
        padding: 10px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    #right-section {
        padding: 20px;
        display: inline;
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
function navlink($url, $label)
{
    echo <<<HTML
<li><a  hx-get="$url"
hx-trigger="click"
hx-target="#left-section"
hx-swap="innerHTML" class="dropdown-item" href="#">$label</a></li>
HTML;
}

function echo_section_for_set(\CardSet $set)
{
?>
    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
        <?php
        foreach (iterate_cards(set: $set) as $card_id => $card_info) {
        ?>
            <li><a hx-get="show.php?card_id=<?= $card_id ?>"
                    hx-trigger="click"
                    hx-target="#right-section"
                    hx-swap="innerHTML" href="#" class="card-link link-body-emphasis d-inline-flex text-decoration-none rounded" data-id="<?= $card_id ?>"><?= $card_id ?> <?= $card_info->name ?? '' ?></a></li>
        <?php } ?>
    </ul>
<?php
}
?>


<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Monsters Masters &amp; Mobsters</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Sets</a>
                        <ul class="dropdown-menu">
                            <?php foreach (CardSet::cases() as $set) { ?>
                                <li><a class="dropdown-item" href="#"><?= sprintf('%s (%s)', $set->name, $set->value) ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Card Types</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Attack</a></li>
                        <li><a class="dropdown-item" href="#">Bane</a></li>
                        <li><a class="dropdown-item" href="#">Bystander</a></li>
                        <li><a class="dropdown-item" href="#">Catastrophe</a></li>
                        <li><a class="dropdown-item" href="#">Defense</a></li>
                        <li><a class="dropdown-item" href="#">Draw</a></li>
                        <li><a class="dropdown-item" href="#">Drone</a></li>
                        <li><a class="dropdown-item" href="#">Facility</a></li>
                        <li><a class="dropdown-item" href="#">Mana</a></li>
                        <li><a class="dropdown-item" href="#">Master</a></li>
                        <li><a class="dropdown-item" href="#">Mobster</a></li>
                        <li><a class="dropdown-item" href="#">Monster</a></li>
                        <li><a class="dropdown-item" href="#">Place</a></li>
                        <li><a class="dropdown-item" href="#">Trait</a></li>
                        <li><a class="dropdown-item" href="#">Upkeep</a></li>
                        <li><a class="dropdown-item" href="#">Vendor</a></li>
                        <li><a class="dropdown-item" href="#">Venue</a></li>
                    </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Subtypes</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Item</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Decks</a>
                        <ul class="dropdown-menu">
                            <?php
                            echo navlink("/deck.php?id=sdv-library", "SDV Library");
                            echo navlink("/deck.php?id=sdv-monsters", "SDV Monsters");
                            echo navlink("/deck.php?id=pdv-e", "PDV Electricty Starter");
                            echo navlink("/deck.php?id=pdv-f", "PDV Fire Starter");
                            echo navlink("/deck.php?id=pdv-w", "PDV Water Starter");
                            ?>
                        </ul>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <main class="container-fluid">
        <div class="row">
            <div class="col col-lg-3 flex-shrink-0 p-3" style="height: 1050px; overflow: auto" id="left-section">
                <?php
                echo_section_for_set(\CardSet::Base);
                ?>
            </div>
            <div class="col col-lg-9" style="height: 1050px" id="right-section">
                <p>Card displays here.</p>
            </div>
        </div>
    </main>

    <script>
        var contentId = null;

        async function load(contentId) {
            if (!contentId && contentId === '') throw 'Invalid contentId';

            const response = await fetch(`show.php?card_id=${contentId}`);

            if (!response.ok) {
                throw new Error(`Response status: ${response.status}`);
            }

            const rightSection = document.getElementById('right-section');
            rightSection.innerHTML = await response.text();

        }

        //        document.querySelectorAll('.card-link').forEach(link => {
        //          link.addEventListener('click', async function(event) {
        //          event.preventDefault();
        //            await load(contentId = this.getAttribute('data-id'));
        //      });
        //   });

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