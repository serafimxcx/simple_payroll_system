<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Earnings and Deductions</title>
    <?php
        include("../navbar.php");
        include("../connect.php");
    ?>
   <link rel="stylesheet" href="styleemployee.css">
</head>
<body>
<?php

        session_start();

        if (!isset($_SESSION['username'])) {
            // Redirect to the login page
            header('Location: ../index.php');
            exit();
          }

        $id = "";
        $eid = "";
        $name = "";
        $basicsalary = "";
        $sss = "";
        $pagibig = "";
        $philhealth = "";
        $status = "Full Time";
        $hourlyrate = "";
    ?>
    <div class="container">
        <br>
    <div class="ed_container">
        <h3><b>Manage Employee's Earnings and Deductions</b></h3>
        <hr>
      
            <?php
            // when a specific employee id has been inputted, it will automatically populate the name field and status field based on the record
            if(isset($_GET['slct_eid'])){
                $result = $conn->query("select fld_eid, fld_status, fld_name from employeetb where fld_eid like '$_GET[slct_eid]'");
                while($row = $result -> fetch_assoc()){
                    $name = $row["fld_name"];
                    $eid = $row["fld_eid"];
                    $status = $row["fld_status"];

                }
                
            }

            // when edit is clicked
            if(isset($_GET['txt_eid'])){
                $result = $conn -> query("select * from employeepaytb where fld_eid like '$_GET[txt_eid]'");
                while($row = $result->fetch_assoc()){
                    $eid = $row["fld_eid"];
                    $name = $row["fld_name"];
                    $basicsalary = $row["fld_basicsalary"];
                    $sss = $row["fld_SSS"];
                    $pagibig = $row["fld_pagibig"];
                    $philhealth = $row["fld_philhealth"];
                    $status = $row["fld_status"];
                    $hourlyrate = $row["fld_hourlyrate"];
                }
            }
     
            ?>
            
            <table width="50%">
            <tr>
                <form action="employeepay.php" method="get">
                    <td>Employee ID:  <br><br></td>
                    <td><input type="text" name="slct_eid" onchange=this.form.submit() placeholder="Enter Employee's ID" value='<?php echo $eid;?>'> <br><br></td>
                </form>  
            </tr>
            
            <?php
            //if record has been found then it will only update the data, if none then it will be saved as a new record
                if(isset($_GET['txt_eid'])){
                    echo "<form action=updateemployeepay.php method=post>";
                    $savebtn = "Update&nbsp;Record";
                }
                else{
                    echo "<form action=saveemployeepay.php method=post>";
                    $savebtn = "Add&nbsp;New&nbsp;Record";
                }     
            ?>
                <tr>
                    <!--hidden input for eid--><input type="hidden" name="txt_eid" value='<?php echo $eid;?>' readonly>
                    <td>Name: <br><br></td>
                    <td><input type="text" name="txt_name" size=30 value='<?php echo $name;?>' readonly><br><br></td>
                </tr>
                <tr>
                    <td>Status: <br><br></td>
                    <td><input type="text" name="txt_status" value='<?php echo $status;?>' readonly><br><br></td>
                </tr>

                </table>
                <hr>

                <!-- specific field will display whether the employee is full time or part time-->
                <?php
                if($status == "Full Time")
                {
                    include("fullemployeepay.php");
                }else if ($status == "Part Time")
                {
                    include("partemployeepay.php");
                }
                ?>
<br><br>
                <script>
                    function ask(eid){
                        if(confirm("Are you sure you want to delete this record? ")){
                            window.location.href = "deleteemployeepay.php?txt_eid=" + eid;
                        }
                    }
                </script>

    </div>
</body>
</html>
            
            
            
