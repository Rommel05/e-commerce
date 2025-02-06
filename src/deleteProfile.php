<?php
    require_once('../php/conn.php');
    //$id = $_GET['id'] ?? null;
    session_unset();
    session_destroy();
    
    $id = $_POST['id'] ?? null;

    $sql = "DELETE FROM users where id = '$id'";
    $query = mysqli_query($conn,$sql);
?>