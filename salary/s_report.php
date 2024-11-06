<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Report</title>
    <?php
    include("../navbar.php");
    include("../connect.php");
    ?>
    <link rel="stylesheet" href="stylereportsalary.css">
</head>
<body>
    <?php

        session_start();

        if (!isset($_SESSION['username'])) {
            // Redirect to the login page
            header('Location: ../index.php');
            exit();
          }

        $status = "Full Time";

        if(isset($_GET['txt_status'])){
            $status = $_GET['txt_status'];
        }


        
        
    ?>
    <div class="container">
        <br>
        <div class="sreport_container">
            <h3><b>Salary Report</b></h3>
            <hr>
            <table>        
            <tr>
                <form action="s_report.php" method="get">
                    <input type="hidden" name="txt_status" value="Full Time">
                <td><input type="submit" class="searchbtn" value="Display Records for Full Time">&nbsp; &nbsp;</td>
                </form>

                <form action="s_report.php?status=Part Time" method="get">
                <input type="hidden" name="txt_status" value="Part Time">
                <td><input type="submit" class="searchbtn" value="Display Records for Part Time"></td>
                </form>  
            </tr>
            </table>
            <br>
        </div>
        
    <br><br>
    <hr style="border: 1px solid black">
    <br><br>
    <div class="stable_container">
    <?php
        if($status == "Full Time")
        {
            include("displayfulltimesalary.php");
        }else if ($status == "Part Time")
        {
            include("displayparttimesalary.php");
        }
    ?>
    </div>
    

</div>
<br><br>
</body>
</html>
    