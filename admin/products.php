<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit();
}

include("../config/db.php");
?>

<?php include("../includes/header.php"); ?>

<div class="container">

    <h2>Manage Products</h2>

    <a class="btn" href="add_product.php">Add New Product</a>
    <br><br>

    <table>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>

        <?php
        $query = mysqli_query($conn, "SELECT * FROM products");

        while ($row = mysqli_fetch_assoc($query)) {
        ?>

        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><img src="../uploads/products/<?php echo $row['image']; ?>" width="70"></td>
            <td><?php echo $row['product_name']; ?></td>
            <td><?php echo $row['category']; ?></td>
            <td><?php echo $row['price']; ?></td>
            <td><?php echo $row['stock']; ?></td>
            <td>
                <a class="btn" href="edit_product.php?id=<?php echo $row['id']; ?>">Edit</a>
                <a class="btn" href="delete_product.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Delete this product?')">Delete</a>
            </td>
        </tr>

        <?php } ?>

    </table>

</div>

