<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <?php 
    include("../connect.php");
    include("../navbar.php");
    ?>
    <link rel="stylesheet" href="styleadmin.css">
</head>
<body>
<?php
        

        session_start();

        if (!isset($_SESSION['username'])) {
            // Redirect to the login page
            header('Location: ../index.php');
            exit();
          }

          $notif = "";

          if(isset($_GET['txt_notif'])){
            if($_GET['txt_notif'] == true){
              $notif = "Updated Successfully";
              header("refresh: 3; url=admin.php");
            }else{
              $notif = "Update Failed";
              header("refresh: 3; url=admin.php");
            }
          }

    ?>
    <div class="container">
      <br>
    <div class="security_container">
        <h3><b>Admin</b></h3>
        <hr>
        <?php 
        $currentdate = date("Y-m-d");
        $currentday = date('j');

        if ($currentday == 15) {
          $resultdate = $conn->query("select * from logintb");

          while($row=$resultdate->fetch_assoc()){
              $date_updated = $row["date_updated"];
          }

          if($date_updated == $currentdate){

          }else{
            echo "<i>Please update your username and password.</i>";
          }
          
          
      }
        
        ?>
        <br>
        <h3>Update Security</h3><br>
        <form action="updatesecurity.php" method="post">
          

          <table width=400px>
          <tr>
            <input type="hidden" name="txt_dateupdated" value='<?php echo $currentdate?>'>
            <td>Enter old username: <br><br></td>
            <td><input type="text" name="txt_olduser" required><br><br></td>
          </tr>
          <tr>
            <td>Enter new username: <br><br></td>
            <td><input type="text" name="txt_newuser" required ><br><br></td>
          </tr>
          <tr>
            <td>Enter old password: <br><br></td>
            <td><input type="password" name="txt_oldpass" required><br><br></td>
          </tr>
          <tr>
            <td>Enter new password: <br><br></td>
            <td><input type="password" name="txt_newpass" required><br><br></td>
          </tr>

        </table>
          <table>
            <tr>
              <td><input type="submit" value="Update" class="updatebtn"></td>
        </form>

        <form action="admin.php" method="get">
        <td><input type="button" value="Reset" class="resetbtn"></td>
        </form>
        </tr>
        </table> 
        <br><br>
        <span><?php echo $notif; ?></span>
        <br>
          </div>
        
        <br>
        <hr style="border: 1px solid black">
        
        <center>
        <form action="../logout.php" method="post">
            <button type="submit" class="logoutbtn"><span class="glyphicon glyphicon-log-in"></span> Logout</button>
        </form>
        </center>
        
        
    </div>
    <br><br>
</body>
</html>

