<?php
 include'db.php';
$id=$_GET['id'];
mysqli_query($connect,"DELETE FROM `trade` WHERE `trade_id`='$id'");
header('location:trade.php');