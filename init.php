<?php
spl_autoload_register(function ($fully_qualified_class_name) {

    $path = realpath(str_replace('\\', DIRECTORY_SEPARATOR, $fully_qualified_class_name) . '.php');
    if (file_exists($path)) {
        include_once $path;
        return true;
    }
});

function iterate_cards($set = '*',  $id = '*'): \Traversable
{

    $set_string = match (true) {
        is_string($set) => $set,
        $set instanceof \CardSet => $set->value,
        is_null($set) => '*',
        $set === true => '*',
    };


    $id_string = match (true) {
        is_string($id) => $id,
        is_null($id) => '*',
        $id === true => '*',
    };

    $jsonFiles = glob("specs/{$set_string}/{$id_string}.json");

    foreach ($jsonFiles as $file) {
        if ($file[0] === '_') {
            continue;
        }
        yield pathinfo($file, PATHINFO_FILENAME);
    }
}
