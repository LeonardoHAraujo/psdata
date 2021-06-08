<?php
    if(session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }

    $isLogged = isset($_SESSION['id']) && session_id() == $_SESSION['id'];
?>