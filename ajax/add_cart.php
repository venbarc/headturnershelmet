<?php
    include '../connect.php';

        // initialization 
        $product_id = $_POST['product_id'];
        $image = $_POST['image'];
        $brand = $_POST['brand'];
        $name = $_POST['name'];
        $price = $_POST['price'];

        $stmt = $conn->prepare("insert into cart (user_id, product_id, image, brand, name, price) values(?,?,?,?,?,?)");
        $stmt->execute([$user_id, $product_id, $image, $brand, $name, $price]);

?>