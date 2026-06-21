<?php include("includes/header.php"); ?>

<div class="hero">
    <div class="hero-content">
        <h1>Welcome to Velora Beauty</h1>

        <p>Discover premium cosmetic products for your natural glow.</p>

        <a href="#products" class="hero-btn">
            ✨ Explore Collection
        </a>
    </div>
</div>

<div class="container" id="products">

    <h2>Our Products</h2>

    <form method="GET">
        <input type="text" name="search" placeholder="Search cosmetic products">
        <button type="submit">Search</button>
    </form>

    <div class="grid">

        <?php
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $query = mysqli_query($conn, "SELECT * FROM products WHERE product_name LIKE '%$search%' OR category LIKE '%$search%'");
        } else {
            $query = mysqli_query($conn, "SELECT * FROM products");
        }

        while ($row = mysqli_fetch_assoc($query)) {
        ?>

        <div class="card product">

            <a href="product_details.php?id=<?php echo $row['id']; ?>">
                <img src="uploads/products/<?php echo $row['image']; ?>">
            </a>

            <h3>
                <a href="product_details.php?id=<?php echo $row['id']; ?>">
                    <?php echo $row['product_name']; ?>
                </a>
            </h3>

            <p><?php echo $row['category']; ?></p>

            <p>Rs. <?php echo $row['price']; ?></p>

            <p><?php echo $row['description']; ?></p>

            <a class="btn" href="product_details.php?id=<?php echo $row['id']; ?>">
                View Details
            </a>

        </div>

        <?php } ?>

    </div>
</div>

<?php include("includes/footer.php"); ?>