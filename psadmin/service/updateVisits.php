<?php

    # Update in visits on Json Dash...
    $dataJson = file_get_contents('../data/visits.json');
    $dataJson = json_decode($dataJson);

    $dataJson->visitas = $dataJson->visitas + $_POST['visit'];

    $newDataJson = json_encode($dataJson, JSON_PRETTY_PRINT);
    file_put_contents('../data/visits.json', $newDataJson);