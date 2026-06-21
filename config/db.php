<?php

$conn = mysqli_connect("localhost", "root", "", "velora_db");

if (!$conn) {
    die("Database connection failed");
}

$base_url = "/velora_beauty/";

?>