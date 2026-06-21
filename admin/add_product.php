<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

include("../config/db.php");

$message = "";

if (isset($_POST['save'])) {
    $name = $_POST['product_name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $description = $_POST['description'];

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    if ($name == "" || $category == "" || $price == "" || $stock == "") {
        $message = "All fields are required";
    } else {
        move_uploaded_file($tmp, "../uploads/products/" . $image);

        mysqli_query($conn, "INSERT INTO products(product_name,category,price,stock,description,image)
        VALUES('$name','$category','$price','$stock','$description','$image')");

        header("Location: products.php");
        exit();
    }
}
?>

<?php include("../includes/header.php"); ?>

<div class="container">
    <div class="card">
        <h2>Add Product</h2>

        <p><?php echo $message; ?></p>

        <form method="POST" enctype="multipart/form-data">
            <label>Product Name</label>
            <input type="text" name="product_name">

            <label>Category</label>
            <input type="text" name="category">

            <label>Price</label>
            <input type="number" name="price">

            <label>Stock</label>
            <input type="number" name="stock">

            <label>Description</label>
            <textarea name="description"></textarea>

            <label>Product Image</label>
            <input type="file" name="image">

            <button type="submit" name="save">Save Product</button>
        </form>
    </div>
</div>

