<?php
    require_once('./php/conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/register-style.css">
</head>
<body>
    <?php
        var_dump($_SESSION);
    ?>
    <header>
        <h1>Register</h1>
    </header>
    <form method="POST" id="form" action="src/registerData.php" enctype="multipart/form-data">
        <label for="name">Name: </label>
        <input type="text" name="name" id="name">
        <br>
        <label for="description">Description: </label>
        <textarea name="description" id="description"></textarea>
        <br>
        <label for="email">Email: </label>
        <input type="email" name="email" id="email">
        <br>
        <label for="password">Password: </label>
        <input type="password" name="password" id="password">
        <br>
        <label for="image">Image: </label>
        <input type="file" name="image" id="image">
        <br>
        <input type="submit" value="Login">
    </form>
</body>
</html>