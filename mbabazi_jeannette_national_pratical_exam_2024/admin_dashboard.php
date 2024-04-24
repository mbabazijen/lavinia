<?php
 session_start();
 if(empty($_SESSION['user'])){
     header('location:admin.php');
}
include("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin_dashboard</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="head">
    <h1>lavinia</h1>
    <h4>admin panel</h4>
    </div>
    <div class="nav">
        <ul>
            <li><a href="new_user.php" target="_blank"></a>user</li>
            <li>marks</li>
            <li>reports</li>
            <li>
                <a href="logout.php"><button>logout</button></a>
            </li>
            <li>
                <?php
                echo $_SESSION['user'];
                ?>
            </li>

          
        </ul>
    </div>
    <div class="container">
        <div><h1>user</h1>
        <?php
        $user="SELECT* FROM user";
        $result =mysqli_query($connect,$user);
        echo mysqli_num_rows($result);
        ?></div>
        <div><h1>tranees</h1> 
          <?php
        $trainee="SELECT* FROM trainee";
        $result =mysqli_query($connect,$trainee);
        echo mysqli_num_rows($result);
        ?></div>
        <div><h1>trade</h1> 
          <?php
        $trade="SELECT* FROM trade";
        $result =mysqli_query($connect,$trade);
        echo mysqli_num_rows($result);
        ?></div>
  
    </div>
    
    
</body>
</html>