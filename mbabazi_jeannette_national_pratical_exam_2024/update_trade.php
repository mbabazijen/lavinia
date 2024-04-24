<?php
session_start();
if (empty($_SESSION['user'])) {
 header('location:admin.php');
}
 include("db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="head">
        <h1>LAVINIA</h1>
        <h4>Admin panel</h4>
    </div>

    <div class="nav">
      <ul>
        <li><a href="new_user.php" target="_blank" >User</a></li>
        <li><a href="">Marks</a></li>
        <li><a href="">Report</a></li>
        <li>
        <a href="logout.php"><button>Logout<button></a></li>
        <li>
          <?php  
          echo $_SESSION['user'];
        ?>
        </li>
      </ul>
    </div>

    <div class="main">
        <div class="left">
            <a href="#trade"> <button>New trade</button></a>
            <a href="#trainee"> <button>New trainee</button></a>
        </div>
        <div class="right">
            <div id="trade">
<fieldset>
    <legend>update trade</legend>
    <form action="" method="POST">
        <?php
        $id=$_GET['id'];
        $select="SELECT *FROM trade where trade_id='$id'";
        $rs=mysqli_query($connect,$select);
        $row=mysqli_fetch_array($rs);
        ?>
        trade name:
        <input type="text" value="<?php echo $row[0] ?>" name="id" hidden>
        <input type="text" value="<?php echo $row[1] ?>" name="tradename">
        <input type="submit" value="update" name="add_trade">
    </form>
    <?php
    if(isset($_POST['add_trade'])){
        $tname=$_POST['tradename'];
        $id=$_POST['id'];
        $update="UPDATE trade SET tradename='$tname' WHERE trade_id='$id'";
        if(mysqli_query($connect,$update)){
            header('location:trade.php');
        }
    
    }
    ?>
</fieldset>

</body>
</html>