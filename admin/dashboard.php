<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

include("../config/db.php");

$product_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM products"));
$user_count = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM users"));
?>

<?php include("../includes/header.php"); ?>

<div class="container">

    <h2>Dashboard</h2>

    <div class="grid">
        <div class="card">
            <h3>Total Products</h3>
            <h1><?php echo $product_count; ?></h1>
        </div>

        <div class="card">
            <h3>Total Users</h3>
            <h1><?php echo $user_count; ?></h1>
        </div>

        <div class="card">
            <h3>Welcome</h3>
            <p><?php echo $_SESSION['user_name']; ?></p>
        </div>
    </div>

    <br>

    <a class="btn" href="products.php">Manage Products</a>
    <a class="btn" href="../auth/logout.php">Logout</a>

</div>

