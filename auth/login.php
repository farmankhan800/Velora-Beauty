<?php
session_start();
include("../config/db.php");

$message = "";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email == "" || $password == "") {
        $message = "All fields are required";
    } else {
        $query = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

        if (mysqli_num_rows($query) == 1) {
            $user = mysqli_fetch_assoc($query);

            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];

                header("Location: ../admin/dashboard.php");
                exit();
            } else {
                $message = "Invalid password";
            }
        } else {
            $message = "Email not found";
        }
    }
}
?>

<?php include("../includes/header.php"); ?>

<div class="container">
    <div class="card">
        <h2>User Login</h2>

        <p><?php echo $message; ?></p>

        <form method="POST">

            <label>Email</label>
            <input type="email" name="email">

            <label>Password</label>
            <input type="password" name="password">

            <button type="submit" name="login">Login</button>
        </form>

        <br>

        <p>
            Don't have an account?
            <a href="register.php">Register here</a>
        </p>
    </div>
</div>

