<?php  

require 'db.php';

    if( isset($_POST["register"]) ) {
        if( registrasi($_POST) > 0 ) {
            echo " <script> 
                alert('register success !');
            </script> ";
        } else {
            echo mysqli_error($conn);
        }
    }

    function registrasi($data) {
        global $conn;

        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username' ");
                if(mysqli_fetch_assoc($result) ) {
                    echo "<script> 
                            alert('username $username already registered !');
                         </script>";
                    return false;
                }

            if( $password !== $password2 ) {
                echo "<script> 
                        alert('register failed !');
                     </script>";
                return false;
            }
                $password = password_hash($password, PASSWORD_DEFAULT);
                
                mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");
                    return mysqli_affected_rows($conn);
    }           

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTER PAGE</title>
</head>
<body>
    <div class="header">
        <h1>RESGISTER</h1>
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
                    <label for="password2">CONFIRM PASSWORD :</label>
                    <input type="password" name="password2" id="password2">
                </li>
                <li>
                    <button type="submit" name="register">SIGN UP !</button>
                </li>
            </ul>
        </form>
    </div>
</body>
</html>