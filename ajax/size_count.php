<?php
include '../connect.php';

$stmt = $conn->prepare("select * from products where brand = 'shark' ");
$stmt->execute();
$res = $stmt->get_result();

if($res->num_rows > 0)
{
    while($row = $res->fetch_assoc())
    {
        $product_id = $row['product_id'];
        $image = $row['image'];
        $brand = $row['brand'];
        $name = $row['name'];
        $price = $row['price'];

        $xs_avail = $row['xs_avail'];
        $sm_avail = $row['sm_avail'];
        $md_avail = $row['md_avail'];
        $lg_avail = $row['lg_avail'];
        $xlg_avail = $row['xlg_avail'];

        $available = ($xs_avail + $sm_avail + $md_avail + $lg_avail + $xlg_avail);

        echo $xs_avail;
    }
}
?>