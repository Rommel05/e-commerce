<?php
    require_once('./php/conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orderly</title>
    <link rel="stylesheet" href="assets/css/login-style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!--<script src="js/login.js"></script>-->
</head>
<body>
    <?php
        var_dump($_SESSION);
    ?>
    <header>
        <h1>Login</h1>
    </header>
    <form method="POST" id="form" action="src/loginData.php">
        <label for="email">Email</label>
        <input type="email" name="email" id="email">
        <br>
        <label for="password">Pasword</label>
        <input type="password" name="password" id="password">
        <br>
        <input type="submit" value="Login">
    </form>
    <script>
        $(document).ready(function () {
            $('#email').focus();
        });
    </script>
</body>
</html>