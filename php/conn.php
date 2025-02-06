<?php
    session_start();
    $conn = mysqli_connect('localhost','root','sa','tiendaPrueba');
    mysqli_query($conn,"SET NAMES 'utf8'");


    /*$query = 'SELECT * FROM users;';
    $users = mysqli_query($conn, $query);
    

    if ($users && mysqli_num_rows($users) >= 1) {
        while($user = mysqli_fetch_assoc($users)) {
            echo "<h2>".$user['username']."</h2>";
            echo "<p>".$user['description']."</p>";
            echo "<p>".$user['email']."</p>";

            $_SESSION['name'] = $user['username'];
        }
    } else {
        echo 'No se ha podido realizar la consulta';
    }*/
    
?>