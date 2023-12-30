<?php
    $db = mysqli_connect("127.0.0.1", "root", "", "nydrinkmenu");
    $query = "DELETE FROM `orderlist` WHERE `order_id`='".$_POST['complete_order']."'";
    mysqli_query($db, $query);
    mysqli_close($db);
    header("Location: ./pendingorders.php");
?>