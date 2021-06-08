<?php

    # Delete one client of json dash...
    if($_POST['id'] === '') {
        die();
    }

    $id = $_POST['id'];

    $dataJson = file_get_contents('../data/clients.json');
    $dataJson = json_decode($dataJson, true);

    unset($dataJson[$id]);

    $newDataJson = json_encode($dataJson, JSON_PRETTY_PRINT);
    file_put_contents('../data/clients.json', $newDataJson);