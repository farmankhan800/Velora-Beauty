<?php
include("config/db.php");

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM products WHERE id='$id'");
$product = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php include("includes/header.php"); ?>

<div class="container">

    <div class="detail-card">

       <div class="detail-left">

    <div class="image-zoom-box">
        <img id="zoomImage" src="uploads/products/<?php echo $product['image']; ?>">
    </div>

    <div class="zoom-controls">
        <button onclick="zoomIn()">Zoom In</button>
        <button onclick="zoomOut()">Zoom Out</button>
        <button onclick="resetZoom()">Reset</button>
    </div>

</div>

        <div class="detail-right">
            <h1><?php echo $product['product_name']; ?></h1>
            <h3><?php echo $product['category']; ?></h3>
            <h2>Rs. <?php echo $product['price']; ?></h2>

            <p><b>Stock:</b> <?php echo $product['stock']; ?></p>

            <h3>Description</h3>
            <p><?php echo $product['description']; ?></p>

            <br>
            <a class="btn" href="index.php">Back</a>
        </div>

    </div>

</div>

<script>
var size = 1;

function zoomIn(){
    size = size + 0.2;
    document.getElementById("zoomImage").style.transform = "scale(" + size + ")";
}

function zoomOut(){
    if(size > 0.6){
        size = size - 0.2;
        document.getElementById("zoomImage").style.transform = "scale(" + size + ")";
    }
}

function resetZoom(){
    size = 1;
    document.getElementById("zoomImage").style.transform = "scale(1)";
}
</script>

<?php include("includes/footer.php"); ?>

</body>
</html>