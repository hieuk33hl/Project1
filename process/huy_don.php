<?php
if (isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    include("../Connection/open.php");
    // UPDATE `size_number` SET `size` = '36' WHERE `size_number`.`id` = 6;
    mysqli_query($conn, "UPDATE hoa_don  SET status_order = 1 WHERE `hoa_don`.`ma_hd` = $order_id");
    include("../Connection/close.php");
    header('location:../user/order_list.php');
} else {
    header('location:../user/order_list.php?err=1');
}
