<?php
session_start();
include('db.php');
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
    <h3>LOGIN</h3>
    <form action="" method="post">
        username<input type="text" name="username">
        password<input type=" password" name="password">
        <input type="submit" value="LOGIN" name="login"> 
    </form>
  <?php
  if(isset($_POST['login'])){
    $user=$_POST['username'];
    $pass=$_POST['password'];
    $select="SELECT `username`, `password` FROM `user` WHERE username='$user' AND password='$pass'";
    $rs=mysqli_query($connect,$select);
    if(mysqli_num_rows($rs)==0){
        print'you fail';
    }
    else{
   $_SESSION['user']=$user;
        header('location:admin_dashboard.php');
    }
  }
  
  ?>
    </div>
    
    
</body>
</html>