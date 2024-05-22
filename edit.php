<?php

    session_start();
    if( ! isset($_SESSION["login"]) ) {
        header("location: login.php");
        exit;
    }

require_once 'db.php';
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM orders WHERE id = '$id'");

if (isset($_POST['submit'])) {
    var_dump($_FILES);
    $name = $_POST['name'];
    $foods = $_POST['foods'];
    $drinks = $_POST['drinks'];
    $table_number = $_POST['table_number'];
    $query = mysqli_query($conn, "UPDATE orders SET name='$name', foods='$foods', drinks='$drinks', table_number='$table_number'");
    header('Location:index.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit post</title>
</head>

<body>

    <div class="container" style="margin-top: 80px">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Edit post
                    </div>
                    <div class="card-body">
                    <form action="" method="POST">
            <div class="form-group">
                <label>NAME :</label>
                <input type="text" name="name" placeholder="e.g John Doe" class="form-control">
            </div>
            <div class="form-group">
                <label>FOODS :</label>
                <input type="text" name="foods" placeholder="e.g Burger " class="form-control">
            </div>
            <div class="form-group">
                <label>DRINKS :</label>
                <input type="text" name="drinks" placeholder="e.g Lychee Tea" class="form-control">
            </div>
            <div class="form-group">
                <label>TABLE NUMBER :</label>
                <input type="text" name="table_number" placeholder="e.g 1, 2, 3." class="form-control">
            </div>
                <button type="submit" class="btn btn-success" name="submit">MAKE ORDER</button>
                <a href="./index.php"><button class="btn btn-success" type="button">BACK TO ORDER LIST</button></a>
                <button type="reset" class="btn btn-warning1">RESET</button>
        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>
