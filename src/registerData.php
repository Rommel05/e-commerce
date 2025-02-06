<?php
require_once('../php/conn.php');

if (!isset($_SESSION)) {
    session_start();
}

//var_dump($_FILES);



$name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : null;
$email = isset($_POST['email']) ? mysqli_real_escape_string($conn, trim($_POST['email'])) : null;
$password = isset($_POST['password']) ? mysqli_real_escape_string($conn, $_POST['password']) : null;
$description = isset($_POST['description']) ? mysqli_real_escape_string($conn, $_POST['description']) : null;
$date = isset($_POST['birthdate']) ? mysqli_real_escape_string($conn, $_POST['birthdate']) : null;
$image = $_FILES['image'] ?? null;

if (isset($image) && $image['error'] == UPLOAD_ERR_OK) {
    $nameImage = $image['name'];
    $type = $image['type'];
    
    if ($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png' || $type == 'image/gif') {
        $directory = '../uploads/'.$nameImage;
        move_uploaded_file($image['tmp_name'], $directory);
    }
}

$errors = [];

if (!empty($name) && !preg_match('/\d/', $name)) {
    $valid_name = true;
} else {
    $valid_name = false;
    $errors['name'] = 'invalid name';
}

if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $valid_email = true;
} else {
    $valid_email = false;
    $errors['email'] = 'invalid email';
}

if (!empty($password)) {
    $valid_password = true;
} else {
    $valid_password = false;
    $errors['password'] = 'invalid password';
}

$insertUser = false;

if (empty($errors)) {
    $insertUser = true;

    $secure_password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);

    $insert = "INSERT INTO users (username, description, birthdate, email, password, image) VALUES ('$name', '$description', '$date','$email','$secure_password', '$nameImage')";
    
    if ($query = mysqli_query($conn, $insert)) {
        /*$_SESSION['name'] = $name;
        $_SESSION['email'] = $email; */
        $_SESSION['filled'] = 'register completed';
        header('location:../login.php'); 
        exit; 
    } else {
        $_SESSION['errors']['general'] = 'registration failure: ' . mysqli_error($conn); 
        header('location:../login.php'); 
        exit;
    }

} else {
    $_SESSION['errors'] = $errors;
    header('location:../register.php');
    exit;
}
?>