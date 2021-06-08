<?php
    require_once 'session.php';

    $credentials = file_get_contents('data/credentials.json');
    $credentials = json_decode($credentials);

    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING) ?? NULL;
    $pass = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_STRING) ?? NULL;

    if($email === $credentials->Email && $pass == $credentials->Password) {
        $_SESSION['email'] = $email;
        $_SESSION['id'] = session_id();
        header('Location: page/dashboard.php');
    }else {
        $_SESSION['message'] = 'Email ou senha incorretos.';
        header('Location: /psadmin/');
    }
?>