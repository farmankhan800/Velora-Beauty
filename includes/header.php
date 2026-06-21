<?php include(__DIR__ . "/../config/db.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Velora Beauty</title>
    <link rel="stylesheet" href="<?php echo $base_url; ?>assets/css/style.css">
</head>
<body>

<nav>
    <h2>Velora Beauty</h2>

    <div>
        <a href="<?php echo $base_url; ?>index.php">Home</a>
        <a href="<?php echo $base_url; ?>auth/login.php">Login</a>
        <a href="<?php echo $base_url; ?>auth/register.php">Register</a>
        <a href="<?php echo $base_url; ?>admin/dashboard.php">Dashboard</a>
        <button onclick="toggleMode()">Dark Mode</button>
    </div>
</nav>