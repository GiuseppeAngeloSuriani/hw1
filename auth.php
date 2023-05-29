<?php
    require_once "function.php";
    session_start();
    connect();
    function checkAuth() {
        if(isset($_SESSION['user_id'])) {
            return $_SESSION['user_id'];
        } else 
            return 0;
    }
?>