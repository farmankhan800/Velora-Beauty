<?php
include("../config/db.php");

$message = "";

if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($name == "" || $email == "" || $password == "") {
        $message = "All fields are required";
    } else {
        $secure_password = password_hash($password, PASSWORD_DEFAULT);

        $query = mysqli_query($conn, "INSERT INTO users(name,email,password)
        VALUES('$name','$email','$secure_password')");

        if ($query) {
            $message = "Registration successful";
        } else {
            $message = "Email already exists";
        }
    }
}
?>

<?php include("../includes/header.php"); ?>

<div class="container">
    <div class="card">
        <h2>User Registration</h2>

        <p><?php echo $message; ?></p>

        <form method="POST">
            <label>Name</label>
            <input type="text" name="name">

            <label>Email</label>
            <input type="email" name="email">

            <label>Password</label>
            <input type="password" name="password">

            <button type="submit" name="register">Register</button>
        </form>
    </div>
</div>

