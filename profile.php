<?php
    require_once('./php/conn.php');
    //var_dump($_SESSION);
    $id = $_SESSION['user']['id'];
    //echo $id;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="assets/css/profile-style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <div class="main-layout">
        <header class="header">
            <h1>Profile</h1>
        </header>
        <div class="main-content">
            <div class="profile-content">
                <div id="profile-info">
                  <!--<h2>Username</h2>
                    <p>Age: user-age</p>
                    <p>User-description</p>-->
                </div>
            </div>
            <div class="profile-controllers">
                <input type="button" value="Delete" id="delete">
            </div>
        </div>
    </div>

    
    <script>
        const xhr = new XMLHttpRequest();

        let id = "<?php echo $id; ?>";
        //console.log(id);

        //xhr.open("GET", "src/showProfile.php?id=" + id);
        xhr.open("POST", "src/showProfile.php");
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.addEventListener("readystatechange", () => {
            if (xhr.readyState == 4 && xhr.status == 200) {
                let contenedor = document.getElementById('profile-info');
                let content = xhr.responseText;
                contenedor.innerHTML = content;
                //console.log(content);
            }
        })
        xhr.send('id=' + id);

        let deleteP = document.getElementById("delete");
        deleteP.addEventListener("click", () => {
            //xhr.open("GET", "src/deleteProfile.php?id=" + id);
            xhr.open("POST", "src/deleteProfile.php");
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.addEventListener("readystatechange", () => {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    location.assign("index.php")
                }
            })
            xhr.send('id=' + id);
        })
    </script>
</body>
</html>