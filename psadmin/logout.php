<?php
    require_once 'verified.php';
    
    session_unset();
    session_destroy();
    header('Location: /psadmin/');
?>