<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

include("../config/db.php");

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM products WHERE id='$id'");

header("Location: products.php");
exit();
?>