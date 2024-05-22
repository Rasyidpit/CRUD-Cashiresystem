<?php  
    session_start();
        if( ! isset($_SESSION["login"]) ) {
            header("location: login.php");
            exit;
        }

    require 'db.php';
    $query = mysqli_query( $conn, 'SELECT * FROM orders' );

    if (isset($_POST['submit'])) {
        var_dump($_FILES);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ORDERS PAGE</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h1>ORDER TABLES</h1>
        </div>
        <br>
        <table class="table">
        <a href="create.php">
            <button type="button" class="btn btn-primary">
                ADD ORDER
            </button>
        </a>
        <a href="logout.php">
            <button type="button" class="btn btn-primary">
                LOGOUT OUT
            </button>
        </a>
        <br><br>
            <thead>
                <tr>
                    <th>NAME</th>
                    <th>FOODS</th>
                    <th>DRINKS</th>
                    <th>TABLE</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)) : ?>
                    <tr>
                        <td> <?= $row['name'] ?> </td>
                        <td> <?= $row['foods'] ?> </td>
                        <td> <?= $row['drinks'] ?> </td>
                        <td> <?= $row['table_number'] ?> </td>
                        <td>
                        <a href="delete.php?id=<?=$row['id']?>">
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Delete
                                </button>
                            </a>
                            <a href="edit.php?id=<?= $row['id']?>">
                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Edit
                                </button>
                            </a>
                        </td>
                    </tr>
                    <?php endwhile ?>
            </tbody>
        </table>
    </div>
</body>
</html>