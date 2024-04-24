<?php
// session_start();
// if (empty($_SESSION['user'])) {
//  header('location:admin.php');
// }
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
    <legend>Add trade</legend>
    <form action="" method="POST">
        trade name:
        <input type="text" name="trade_name">
        <input type="submit" value="Add" name="add_trade">
    </form>
    <?php
    if(isset($_POST['add_trade'])){
        $tname=$_POST['trade_name'];
        $insert="INSERT INTO `trade`(`trade_id`, `tradename`) 
        VALUES ('','$tname')";
        if(mysqli_query($connect,$insert)){
            echo'new inserted';
        }
        else{
            echo'fail,try again';
        }
    }
    ?>
</fieldset>
<table>

    <tr>
        <th>id</th>
        <th>trade name</th>
        <th> edit/delete</th>
    </tr>
    <?php
    $select="SELECT * FROM trade";
    $rs=mysqli_query($connect,$select);
    while ($rows=mysqli_fetch_assoc($rs)) {
        ?>
        <tr>
            <td><?php echo $rows['trade_id'];?></td>
            <td><?php echo $rows['tradename'];?></td>
            <td><a href="delete_trade.php?id=<?php echo $rows['trade_id']?>">X</a> </td>
        </tr>
        <a href="update_trade.php?id=<?php echo $rows['trade_id']?>">update</a> 
       
        <?php
    }
    ?>
</table>
            </div>
            <div id="tranee">
            <fieldset>
    <legend>Add trainee</legend>
    <form action="" method="POST">
        first name:
        <input type="text" name="firstname">
        last name:
        <input type="text" name="lastname">
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
        $fname=$_POST['firstname'];
        $lname=$_POST['lastname'];
        $gander=$_POST['gender'];
        $td_id=$_POST['trade_id'];
        $insert="INSERT INTO trainee
         VALUES ('','$fname','$lname','$gander',' $td_id')";
         if(mysqli_query($connect,$insert)){
            echo 'new tranee added';
         }else{
            echo 'failed pleas try again';
         }
    }
    ?>
</fieldset>
<table>
    <tr>
        <th>#</th>
        <th>first_name</th>
        <th>last_name</th>
        <th>Gender</th>
        <th>trade</th>
        <th>action</th>
    </tr>
    <?php
    $select='SELECT * FROM trainee';
    $rs=mysqli_query($connect,$select);
    while ($rows=mysqli_fetch_array($rs)) {
        ?>
        <tr>
            <td><?php echo $rows['0'];?></td>
            <td><?php echo $rows['1'];?></td>
            <td><?php echo $rows['2'];?></td>
            <td><?php echo $rows['3'];?></td>
            <td><?php echo $rows['4'];?></td>
            <td><a href="delete_trainee.php?id=<?php echo $rows['trainee_id']?>">X</a> 
            <td><a href="update_trainee.php?id=<?php echo $rows['trainee_id']?>">update</a> 
        </tr>
        </tr></td>
        </tr>
        <?php
        
    }
    ?>
</table>
            </div>

        </div>

    </div>
</body>
</html>