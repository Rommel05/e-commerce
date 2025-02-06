<?php
    require_once('../php/conn.php');
    //$id = $_GET['id'] ?? null;
    $id = $_POST['id'] ?? null;

    $sql = "SELECT * FROM users where id = '$id'";
    $query = mysqli_query($conn,$sql);
    if ($query && mysqli_num_rows($query) == 1) {
        $user = mysqli_fetch_assoc($query);
        echo "<h2>".$user['username']."</h2>";
        echo "<img src='uploads/" . $user['image'] . "' id='img'>";
        echo "<p>".$user['description']."</p>";
        echo "<p>".$user['email']."</p>";
    }
?>