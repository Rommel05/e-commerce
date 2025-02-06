<?php
    require_once('../php/conn.php');

    if (!isset($_SESSION)) {
        session_start();
    }

    session_unset();
    session_destroy();
    header('location:../index.php');
?>