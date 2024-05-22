<?php 

    session_start();
    if( ! isset($_SESSION["login"]) ) {
        header("location: login.php");
        exit;
    }

    require 'db.php';

    $id = $_GET['id'];
    $query = mysqli_query($conn, "DELETE FROM orders WHERE id = '$id'");
    if($query) {
        header('location:index.php');
    }

?>