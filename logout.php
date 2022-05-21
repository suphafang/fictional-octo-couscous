<?php
    session_start();
    unset($_SESSION['authentication']);
    session_destroy();
    header('location: /login');
?>