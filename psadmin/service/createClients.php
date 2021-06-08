<?php

    # Create one new client in json dash...
    function endKey($array){
        end($array);
        return key($array);
    }

    if(
        $_POST['name'] === '' ||
        $_POST['status'] === '' ||
        $_POST['dataOfPayment'] === '' ||
        $_POST['value'] === ''
    ) {
        die();
    }

    $dataJson = file_get_contents('../data/clients.json');
    $dataJson = json_decode($dataJson, true);

    $nextId = endKey($dataJson) + 1;

    $newClient = [
        "id" => $nextId,
        "nome" => $_POST['name'],
        "status" => $_POST['status'],
        "pagamento" => $_POST['dataOfPayment'],
        "valor" => $_POST['value']
    ];

    $dataJson[] = $newClient;

    $newDataJson = json_encode($dataJson, JSON_PRETTY_PRINT);
    file_put_contents('../data/clients.json', $newDataJson);