<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

include("../config/db.php");

$id = $_GET['id'];

$product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM products WHERE id='$id'"));

if (isset($_POST['update'])) {
    $name = $_POST['product_name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $description = $_POST['description'];

    if ($_FILES['image']['name'] != "") {
        $image = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp, "../uploads/products/" . $image);
    } else {
        $image = $product['image'];
    }

    mysqli_query($conn, "UPDATE products SET
    product_name='$name',
    category='$category',
    price='$price',
    stock='$stock',
    description='$description',
    image='$image'
    WHERE id='$id'");

    header("Location: products.php");
    exit();
}
?>

<?php include("../includes/header.php"); ?>

<div class="container">
    <div class="card">
        <h2>Edit Product</h2>

        <form method="POST" enctype="multipart/form-data">
            <label>Product Name</label>
            <input type="text" name="product_name" value="<?php echo $product['product_name']; ?>">

            <label>Category</label>
            <input type="text" name="category" value="<?php echo $product['category']; ?>">

            <label>Price</label>
            <input type="number" name="price" value="<?php echo $product['price']; ?>">

            <label>Stock</label>
            <input type="number" name="stock" value="<?php echo $product['stock']; ?>">

            <label>Description</label>
            <textarea name="description"><?php echo $product['description']; ?></textarea>

            <label>Product Image</label>
            <input type="file" name="image">

            <br>
            <img src="../uploads/products/<?php echo $product['image']; ?>" width="100">

            <br><br>

            <button type="submit" name="update">Update Product</button>
        </form>
    </div>
</div>

