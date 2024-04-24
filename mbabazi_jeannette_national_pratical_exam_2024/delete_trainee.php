<?php
 include'db.php';
$id=$_GET['id'];
mysqli_query($connect,"DELETE FROM `trainee` WHERE `trainee_id`='$id'");
header('location:trade.php');