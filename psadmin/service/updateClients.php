<?php

    # Edit one client in json dash...
    if(
        $_POST['id'] === '' ||
        $_POST['name'] === '' ||
        $_POST['status'] === '' ||
        $_POST['dataOfPayment'] === '' ||
        $_POST['value'] === ''
    ) {
        die();
    }

    $id = $_POST['id'];

    $dataJson = file_get_contents('../data/clients.json');
    $dataJson = json_decode($dataJson, true);

    $newClient = [
        "id" => $_POST['id'],
        "nome" => $_POST['name'],
        "status" => $_POST['status'],
        "pagamento" => $_POST['dataOfPayment'],
        "valor" => $_POST['value']
    ];

    $dataJson[$id] = $newClient;

    $newDataJson = json_encode($dataJson, JSON_PRETTY_PRINT);
    file_put_contents('../data/clients.json', $newDataJson);
