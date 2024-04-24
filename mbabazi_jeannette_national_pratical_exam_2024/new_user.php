<?php
 session_start();
 if(!empty($_SESSION['user'])){
    header('location:admin.php');
 }
include("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="head">
    <h1>lavinia</h1>
    <h4>admin panel</h4>
    </div>
    <div class="body">
    <h3>new user</h3>
    <form action="" method="post">
        username<input type="text" name="username">
        password<input type=" password" name="password">
        <input type="submit" value="create" name="create"> 
    </form>
  <?php
  if(isset($_POST['create'])){
    $user=$_POST['username'];
    $pass=$_POST['password'];
    $insert="INSERT INTO user VALUE('','$user','$pass')";
    $a=mysqli_query($connect,$insert); 

    if($a){
        echo "success";
    }
    else{
        echo "failed";
}
  }

  ?>
    </div>
    
    
</body>
</html>