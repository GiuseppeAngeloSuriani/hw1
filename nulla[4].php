<?php 
    require_once 'function.php';
    require_once "auth.php";
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }
    header('Content-Type: application/json');
    rimuovi();
?>