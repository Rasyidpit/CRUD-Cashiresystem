<?php 
session_start();

if(isset($_COOKIE['login']) ) {
    if($_COOKIE['login'] == 'true') {
      $_SESSION['login'] = true;
    }
}

if(isset($_SESSION["login"]) ) {
    header("location: index.php");
}


require 'db.php';
if(isset($_POST["login"]) ) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
            $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' ");

            if(mysqli_num_rows($result) === 1 ) {

                $row = mysqli_fetch_assoc($result);
                    if(password_verify($password, $row["password"]) ) {

                        $_SESSION["login"] = true;

                        if(isset($_POST['remember'])) {
                            setcookie('login', 'true', time() + 10000);
                        }

                        header("location: index.php");
                        exit;
                    }
            }
            $error = true;
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PAGE</title>
</head>
<body>

    <?php if(isset($error) ) : ?>
        <p> login failed password or username incorrect </p>
    <?php endif; ?>

    <div class="header">
        <h1>LOGIN</h1>
    </div>
    <div class="form">
        <form action="" method="post">
            <ul>
                <li>
                    <label for="username">USERNAME :</label>
                    <input type="text" name="username" id="username">
                </li>
                <li>
                    <label for="password">PASSWORD :</label>
                    <input type="password" name="password" id="password">
                </li>
                <li>
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">REMEBER ME</label>
                </li>
                <li>
                    <button type="submit" name="login">LOGIN !</button>
                </li>
            </ul>
        </form>
    </div>
</body>
</html>