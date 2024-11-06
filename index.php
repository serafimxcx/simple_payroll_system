<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <?php
    include("connect.php");
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $inptuser = $_POST['username'];
        $inptpass = $_POST['password'];

        $result = $conn->query("select * from logintb");
        while($row = $result -> fetch_assoc()){
            $user = $row['fld_username'];
            $pass = $row['fld_password'];
        }

        if ($inptuser == $user && $inptpass == $pass) {
        $_SESSION['username'] = $inptuser;
        header('Location: /infoman_finalproject/salary/salary.php');
        exit;
        } else {
        header('Location: index.php');
        exit;
        }
    }
    
    ?>
   <br>
   <center>
    <h1>WELCOME</h1>
    <p>Please login your admin account.</p>
    </center>
    <br>
    <form action="index.php" method="post">
    
      <div class="container">
        <br><br>
        <img src="logo.jpg" alt="logo" class="logo"><br><br>
        <hr>
        <table width="100%" >
        <tr>
            <td><span class="glyphicon glyphicon-user"></span><label for="username">&nbsp;&nbsp;<b>Username:</b></label><br><br></td>
            <td><input type="text" placeholder="Enter Username" name="username" required><br><br></td>
        </tr>
        <tr>
            <td>
            <label for="password"><span class="glyphicon glyphicon-lock"></span>&nbsp;&nbsp;<b>Password:</b></label><br>
            </td>
            <td>
            <input type="password" placeholder="Enter Password" name="password" required><br>
            </td>
        </tr>
        </table>
        <hr>
       
        <button type="submit" class="loginbtn">Login</button>

      </div>
     
    
    </form>
</body>
</html>