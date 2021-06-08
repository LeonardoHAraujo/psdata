<?php

    # Update credentials in json...
    if(
        $_POST['name'] === '' ||
        $_POST['email'] === '' ||
        $_POST['pass'] === ''
    ) {
        die();
    }

    $dataJson = file_get_contents('../data/credentials.json');
    $dataJson = json_decode($dataJson);

    $dataJson->Name = $_POST['name'];
    $dataJson->Email = $_POST['email'];
    $dataJson->Password = $_POST['pass'];

    $newDataJson = json_encode($dataJson, JSON_PRETTY_PRINT);
    file_put_contents('../data/credentials.json', $newDataJson);