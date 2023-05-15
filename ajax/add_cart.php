<?php
    include '../connect.php';

        // initialization 
        $user_id = mysqli_escape_string($conn, $_POST['user_id']);
        $product_id = mysqli_escape_string($conn, $_POST['product_id']);
        $image = mysqli_escape_string($conn, $_POST['image']);
        $brand = mysqli_escape_string($conn, $_POST['brand']);
        $name = mysqli_escape_string($conn, $_POST['name']);
        $price = mysqli_escape_string($conn, $_POST['price']);

        $stmt = $conn->prepare("insert into cart (user_id, product_id, image, brand, name, price) values(?,?,?,?,?,?)");
        $stmt->execute([$user_id, $product_id, $image, $brand, $name, $price]);
        $stmt->close();
?>