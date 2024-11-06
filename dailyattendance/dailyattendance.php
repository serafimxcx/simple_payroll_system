<?php
ob_start();
    include("../connect.php");

    $current_date = date("Y-m-d");
    $notif = "";
    $inoutstatus = "";
    $status = "";
    $fullorpart = "";

    $resultdate = $conn->query("select * from dailyattendancetb where fld_date = '$current_date'");

    //insert new records for that day which is the default is absent
    if(mysqli_num_rows($resultdate) == 0){
        $result = $conn->query("select fld_eid, CONCAT(CONCAT(CONCAT(CONCAT(fld_lname, ', '), fld_fname), ' '), fld_mname) as fullname, fld_status, fld_schedstart, fld_schedend from employeetb");
        while($row = $result -> fetch_assoc()){
            $name = $row["fullname"];
            $eid = $row["fld_eid"];
            $status = $row["fld_status"];
            $schedstart=$row["fld_schedstart"];
            $schedend=$row["fld_schedend"];

            $conn -> query("insert into dailyattendancetb (fld_eid, fld_status,  fld_name, fld_isPresent, fld_isAbsent, fld_date,  fld_schedstart, fld_schedend) values('$eid', '$status', '$name', '0', '1','$current_date', '$schedstart', '$schedend')");
        } 
    }
    
    if(isset($_GET['txt_id'])){
        $result = $conn->query("select * from dailyattendancetb where id = '$_GET[txt_id]'");
        while($row = $result -> fetch_assoc()){
            $eid = $row["fld_eid"];
            $fullorpart = $row["fld_status"];
            $timein = $row["fld_timein"];
            $isLate = $row["fld_isLate"];
            $minutesLate = $row["fld_minutesLate"];
            $isUndertime = $row["fld_isUndertime"];
            $minutesUndertime = $row["fld_minutesUndertime"];
            $isOvertime = $row["fld_isOvertime"];
            $minutesOvertime = $row["fld_minutesOvertime"];
            $timeout = $row["fld_timeout"];
            $hoursworked = $row["fld_hoursworked"];

        }

        
        if(empty($eid)){
            header("location: dailyattendance.php");
        }

        
        
            if(isset($timeout)){
                $notif = "Employee#$eid - Time Out Successfully - $timeout";

                if($isUndertime == 1 && $isOvertime == 0){
                    $inoutstatus = "Status: Undertime - $minutesUndertime minutes <br><br>Hours Worked: $hoursworked hours";
                }else if($isOvertime == 1 && $isUndertime == 0){
                    $inoutstatus = "Status: Overtime $minutesOvertime minutes <br><br>Hours Worked: $hoursworked hours";
                }else if($isOvertime == 0 && $isUndertime == 0){
                    $inoutstatus = "Status: On-time <br><br>Hours Worked: $hoursworked hours";
                }

            }else{
                $notif = "Employee#$eid - Time In Successfully - $timein ";
                if($isLate == 1){
                    $inoutstatus = "Status: Late - $minutesLate minutes";
                }else{
                    $inoutstatus = "Status: On-time";
                }
            }
        

        header("refresh: 5; url=dailyattendance.php");
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>GALE Daily Attendance</title>
    <link rel="stylesheet" href="styleattendance.css">
</head>
<body>
    


    <div class="container" >
    
    <br>
   
    <div style="float: left;">
    
    <h1><b>GALE Daily Attendance</b></h1>
    </div>
    
    <div style="float: right;">
        <table class="timedate_container">
            <tr>
                <td><h3 class="timecontainer" style="margin-right: 50px; margin-left: 10px;"><span id="displaytime"></span></h3></td>
                <td ><h3 ><span id="displaydate"></span></h3></td> 
            </tr>
        </table>  
    </div>

    <br><br><br>
    <hr>
    <br>
    <div class="leftrightcontainer">
        <div class="left-div">
        <div class="timerecords">

            <form action="dailyattendance.php"  method="get">
                Search Employee through ID or Name: <input type="text" name="slct_eidr"><br><br>
                Search through Date: <input type="date" name="slct_payrollstart">&nbsp; to&nbsp; <input type="date" name="slct_payrollend"><br><br>
                <input type="submit" value="Search" class="smallsearchbtn">
                <hr>
                
                
                
                </form>
                <?php 
                if(isset($_GET["slct_payrollend"])){
                    if($_GET["slct_payrollend"] != ""){
                        echo "Date: $_GET[slct_payrollstart] to $_GET[slct_payrollend] <br><br>";
                    }
                }
                
                
                ?>
                <table class='table table-bordered' width=100% style="font-size: 13px;">
                    <tr>
                        <th>Date</th><th>Employee ID</th><th>Name</th><th>Time In</th><th>Time Out</th>
                    </tr>

                    <?php 
                    if(empty($_GET['slct_eidr']) && empty($_GET['slct_payrollstart']) && empty($_GET['slct_payrollend'])){
                        $resulttime = $conn->query("select * from dailyattendancetb where fld_date = '$current_date' ORDER BY fld_date DESC, fld_timein DESC");
                        while($row = $resulttime -> fetch_assoc()){
                        echo "
                            <tr>
                                    <td>$row[fld_date]</td>
                                    <td>$row[fld_eid]</td>
                                    <td>$row[fld_name]</td>
                                    <td>$row[fld_timein]</td>
                                    <td>$row[fld_timeout]</td>
                            </tr>";
                            
                        }
                        
                    }else{
                        include("daily_attendancerecords.php");

                    }
                    

                    ?>

                </table>
            </div>   
        </div>

        <div class="right-div">
        <div class="timeinout_container">
                    <form action="dailyattendance.php" method="post">
                        <br>
                        <img src="../logo.jpg" alt="logo" class="logo"><br><br>
                        <hr style="border: 1px solid black">
                        <h3>TIME IN - TIME OUT</h3>
                        <input type="hidden" name="txt_date" id="date" value='<?php echo $current_date; ?>'><br>
                        <input type="text" name="slct_eid" id="slcteid" onchange=this.form.submit() placeholder="Enter Employee's ID"> <br><br>
                        <hr style="border: 1px solid black">
                        <span><?php echo $notif; ?></span><br><br>
                        <span><?php echo $inoutstatus;?></span>
                    </form>    
                </div>
        </div>
    </div>
   
    <?php
    //timein timeout
    $id="";
    $eid="";     
    $name = "";
    $status = "";
    $schedstart="";
    $schedend="";
    $isPresent = "";
    $isAbsent = "";
    $date = "";
    $timein = "";
    $timeout = "";
    $isLate = "";
    $minutesLate = "";
    $isUndertime = "";
    $minutesUndertime = "";
    $isOvertime = "";
    $minutesOvertime = "";
    $hoursworked = "";

            if(isset($_POST["slct_eid"])){
                echo "<script src=attendancescript.js></script>";
                $eid = $_POST["slct_eid"];
                $date = $_POST["txt_date"];
            }

            
            

            if(isset($eid)){
                $result = $conn->query("select fld_eid, CONCAT(CONCAT(CONCAT(CONCAT(fld_lname, ', '), fld_fname), ' '), fld_mname) as fullname, fld_status, fld_schedstart, fld_schedend from employeetb where fld_eid like '$eid'");
                while($row = $result -> fetch_assoc()){
                    $name = $row["fullname"];
                    $eid = $row["fld_eid"];
                    $status = $row["fld_status"];
                    $schedstart=$row["fld_schedstart"];
                    $schedend=$row["fld_schedend"];
                } 
                
                $result2 = $conn->query("select * from dailyattendancetb where fld_eid = '$eid' and fld_date = '$date'");
                while($row = $result2 -> fetch_assoc()){
                    $id=$row["id"];
                    $eid = $row["fld_eid"];
                    $name = $row["fld_name"];
                    $status = $row["fld_status"];
                    $isPresent = $row["fld_isPresent"];
                    $isAbsent = $row["fld_isAbsent"];
                    $date = $row["fld_date"];
                    $timein = $row["fld_timein"];
                    $timeout = $row["fld_timeout"];
                    $isLate = $row["fld_isLate"];
                    $minutesLate =$row["fld_minutesLate"];
                    $isUndertime = $row["fld_isUndertime"];
                    $minutesUndertime = $row["fld_minutesUndertime"];
                    $isOvertime = $row["fld_isOvertime"];
                    $minutesOvertime = $row["fld_minutesOvertime"];
                    $hoursworked = $row["fld_hoursworked"];
                    $schedstart=$row["fld_schedstart"];
                    $schedend=$row["fld_schedend"];
                }
            }

           if(isset($timein)){
            echo "<form id=myForm action=savetimeout.php method=post>";
           }else{
                echo "<form id=myForm action=savetimein.php method=post>";
           }
        ?>
        
        <div style="display:none;">
        <input type="hidden" name="txt_id" value='<?php echo $id;?>' readonly><br><br>
       <input type="hidden" name="txt_eid" value='<?php echo $eid;?>' readonly><br><br>
        <input type="hidden" name="txt_status" value='<?php echo $status;?>' readonly><br><br>
        <input type="hidden" name="txt_name" size=30 value='<?php echo $name;?>' readonly><br><br>
         <input type="hidden" name="txt_isPresent" id="isPresent" placeholder="present" value='<?php echo $isPresent;?>' readonly><br><br>
         <input type="hidden" name="txt_isAbsent" id="isAbsent" placeholder="absent" value='<?php echo $isAbsent;?>' readonly><br><br>
         <input type="hidden" name="txt_date" id="date" style="text-align:center;"  value='<?php echo $date;?>' readonly><br><br>
         <input type="hidden" name="txt_timein" id="timein" style="text-align:center;" value='<?php echo $timein;?>' readonly><br><br>
         <input type="hidden" name="txt_schedstart" id="txt_schedstart" value='<?php echo $schedstart;?>'><br><br>
         <input type="hidden" name="txt_isLate" id="isLate" placeholder="late" value='<?php echo $isLate;?>' readonly><br><br>
         <input type="hidden" name="txt_minutesLate" id="minutesLate" placeholder="minutesLate" value='<?php echo $minutesLate;?>' readonly><br><br>
         <input type="hidden" name="txt_timeout" id="timeout" style="text-align:center;"  value='<?php echo $timeout;?>' readonly><br><br>
         <input type="hidden" name="txt_schedend" id="txt_schedend" value='<?php echo $schedend;?>'><br><br>
         <input type="hidden" name="txt_isUndertime" id ="isUndertime" placeholder="undertime" value='<?php echo $isUndertime;?>' readonly> <br><br>
         <input type="hidden" name="txt_minutesUndertime" id="minutesUndertime" placeholder="minutesUndertime" value='<?php echo $minutesUndertime;?>' readonly><br><br>
        <input type="hidden" name="txt_isOvertime" id ="isOvertime" placeholder="overtime" value='<?php echo $isOvertime;?>' readonly> <br><br>
        <input type="hidden" name="txt_minutesOvertime" id="minutesOvertime" placeholder="minutesOvertime" value='<?php echo $minutesOvertime;?>' readonly><br><br>
        <input type="hidden" name="txt_hoursworked" id ="hoursworked" placeholder="hoursworked"  value='<?php echo $hoursworked;?>'readonly>
        </form>
        </div>
         
           
    
        
        
    </div>  

   
<script>
    //date
    var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    var currentDate = new Date();
    var month = months[currentDate.getMonth()];
    var day = currentDate.getDate();
    var year = currentDate.getFullYear();

    var formattedDate = month + " " + day + ", " + year;
    
    document.getElementById("displaydate").innerHTML = formattedDate; 

    //time
    function displayTime(){
    var time = new Date().toLocaleString("en-US", {timeZone: "Asia/Manila"});
    var timeParts = time.split(" ");
    var timeString = timeParts[1] + " " + timeParts[2];
    document.getElementById("displaytime").innerHTML = timeString;  
    }

    setInterval(displayTime, 1000);
</script>
</body>
</html>