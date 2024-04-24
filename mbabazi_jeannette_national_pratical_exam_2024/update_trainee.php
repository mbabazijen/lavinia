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

            <div id="tranee">
            <fieldset>
    <legend>update trainee</legend>
    <?php
    $id=$_GET['id'];
    $select="SELECT * FROM trainee where trainee_id='$id'";
    $rs=mysqli_query($connect,$select);
    $row=mysqli_fetch_array($rs);
    
    ?>
    <form action="" method="POST">
        first name:
        
        <input type="text" value="<?php echo $row[1] ;?>" name="firstname">
        last name:
        <input type="text" value="<?php echo $row[2] ;?>" name="lastname">
        Gender:
        <input type="radio" name="gender" id="" value="male"> Male
        <input type="radio" name="gender" id="" value="female"> Female
        <select name="trade_id" id="" required>
            <option value="">select trade</option>
            <?php
            $select='select * from trade';
            $rs=mysqli_query($connect,$select);
            while ($rows=mysqli_fetch_array($rs)) { ?>
            <option value="<?php echo $rows[0]; ?>">
            <?php echo $rows[1];  ?></option>

                <?php
            }
            ?>
        </select>
        <input type="submit" value="Add" name="add_tranee">
    </form>
    <?Php
    if (isset($_POST['add_tranee'])) {
        $id=$_POST['id'];
        $fname=$_POST['firstname'];
        $lname=$_POST['lastname'];
        $gander=$_POST['gender'];
        $td_id=$_POST['trade_id'];
        $update="UPDATE `trainee` SET `trainee_id`='',`firstname`='$fname',`lastname`='$lname',`gender`='$gander',`trade_id`='$td_id' WHERE trainee_id='$id'";
         if(mysqli_query($connect,$update)){
            header('location:trade.php');
         }else{
            echo 'failed pleas try again';
         }
    }
    ?>
</body>
</html>