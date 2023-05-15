<?php
    include '../connect.php';

        // initialization 
        $user_id = mysqli_escape_string($conn, $_POST['user_id']);
        $product_id = mysqli_escape_string($conn, $_POST['product_id']);

        $stmt = $conn->prepare("delete from cart where user_id = ? and product_id = ? ");
        $stmt->execute([$user_id, $product_id]);
        $stmt->close();
?>