<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GALE Payroll System</title>
    <?php
        include("../navbar.php");
        include("../connect.php");
    ?>
   <link rel="stylesheet" href="stylesalary.css">
</head>
<body>
    <br>
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
        $status = "Full Time";
        $payrollstart = "";
        $payrollend = "";
        $basicsalary = 0;
        $sss = 0;
        $pagibig = 0;
        $philhealth = 0;
        $noofpresent = "";
        $noofabsent = "";
        $nooflate = "";
        $noofundertime = "";
        $noofovertime= "";
        $totalhoursworked = "";
        $overtimepay = 0;
        $deductionabsent = 0;
        $deductionlate = 0;
        $deductionundertime = 0;
        $netpay = 0;
        $hourlyrate = 0;
        $totaldeduction = 0;
        $noofleave = "";
        $noofdayoff = "";
        $bonuspay = 0;
        $grosspay = 0;
        $ptotalsalary = 0;
        $rateperday = 0;
        $holidaypay = 0;
        $schedstart ="";
        $schedend="";
    ?>
    
    <div class="container">
        <br><br>
        
        <center>
        <h1><b>GALE Payroll System</b></h1>
        </center>
        
        
        <br>
        <hr>

            <?php
            // when a specific employee id has been inputted, it will automatically populate the name field and status field based on the record
            if(isset($_GET['slct_eid'])){
                $resultsched = $conn->query("select fld_schedstart, fld_schedend from employeetb where fld_eid like '$_GET[slct_eid]'");
                while($row = $resultsched -> fetch_assoc()){
                    $schedstart = $row["fld_schedstart"];
                    $schedend = $row["fld_schedend"];
                }

                $result = $conn->query("select fld_eid, fld_status, fld_name, fld_basicsalary, fld_SSS, fld_pagibig, fld_philhealth, fld_hourlyrate from employeepaytb where fld_eid like '$_GET[slct_eid]'");
                while($row = $result -> fetch_assoc()){
                    $name = $row["fld_name"];
                    $eid = $row["fld_eid"];
                    $status = $row["fld_status"];
                    $basicsalary = $row["fld_basicsalary"];
                    $sss = $row["fld_SSS"];
                    $pagibig = $row["fld_pagibig"];
                    $philhealth = $row["fld_philhealth"];
                    $hourlyrate = $row["fld_hourlyrate"];

                }
                $payrollstart = $_GET['txt_payrollstart'];
                $payrollend = $_GET['txt_payrollend'];

                $resultpay = $conn-> query("select SUM(fld_isPresent) as no_of_present, SUM(fld_isAbsent) as no_of_absent, SUM(fld_minutesLate) as no_of_late, SUM(fld_minutesUndertime) as no_of_undertime, SUM(fld_minutesOvertime) as no_of_overtime, SUM(fld_hoursworked) as totalhoursworked, fld_schedstart, fld_schedend from dailyattendancetb where fld_eid like '$_GET[slct_eid]' AND fld_date BETWEEN '$payrollstart' AND '$payrollend'");
                while($row = $resultpay -> fetch_assoc()){
                    $noofpresent = $row["no_of_present"];
                    $noofabsent = $row["no_of_absent"];
                    $nooflate = $row["no_of_late"];
                    $noofundertime = $row["no_of_undertime"];
                    $noofovertime= $row["no_of_overtime"];
                    $totalhoursworked = $row["totalhoursworked"];
                }

                $noofleave = floatval($_GET['txt_noofleave']);
                $noofdayoff = floatval($_GET['txt_noofdayoff']);
                $bonuspay = floatval($_GET['txt_bonuspay']);


                //get the hours work per day of an employee
                if($schedstart != "" && $schedend != "" ){
                    $mysqlschedstart = DateTime::createFromFormat('H:i:s', $schedstart);
                    $mysqlschedend = DateTime::createFromFormat('H:i:s', $schedend);
                    $timeDifference = $mysqlschedend->diff($mysqlschedstart);
                    $timeDifferenceHours = $timeDifference->h + ($timeDifference->days * 24);
                }
                

                $noofabsent -= $noofleave;
                $noofabsent -= $noofdayoff;
                $noofpresent -= $noofleave;

                if($noofabsent <= 0 ){
                    $noofabsent = 0;
                }

                if($noofpresent <= 0){
                    $noofpresent = 0;
                }

                //rate per day
                $workingdays = $noofpresent + $noofabsent;
                if($workingdays != 0){
                    $rateperday = $basicsalary/$workingdays;
                }

                //computation for full time
                
                //overtime pay
                $addedAmount_ot = 4; //perminute
                $overtimepay = $addedAmount_ot * $noofovertime;

                //holidaypay
                $regularholiday = array(
                    '01-01', // New Year's Day
                    '04-09', //Day of Valor
                    '05-01', //Labor day
                    '06-12', //independence day
                    '11-30', //bonifacio day
                    '12-25', // Christmas Day
                    '12-30' //Rizal Day
                );

                $specialholiday = array(
                    '02-25', //EDSA
                    '08-21', //Ninoy Aquino Day
                    '11-1' //all saints day
                );

                $resultholiday = $conn->query("select * from dailyattendancetb where fld_eid like '$_GET[slct_eid]' AND fld_date BETWEEN '$payrollstart' AND '$payrollend'");
                while($row = $resultholiday->fetch_assoc()){
                    $recordedDate = $row['fld_date'];
                    $formatteddate = date('m-d', strtotime($recordedDate));

                    
                    if(in_array($formatteddate, $regularholiday)){
                       
                        if(($row["fld_status"]=="Full Time") && ($row["fld_isPresent"] == 1)){
                            $rateperday = $basicsalary/$workingdays;
                            $addedregular =  $rateperday * 2;
                            $holidaypay += $addedregular;
                        }
                        else if(($row["fld_status"]=="Part Time") && ($row["fld_isPresent"] == 1)){
                            $mysqlschedstart = DateTime::createFromFormat('H:i:s', $schedstart);
                            $mysqlschedend = DateTime::createFromFormat('H:i:s', $schedend);
                            $timeDifference = $mysqlschedend->diff($mysqlschedstart);
                            $timeDifferenceHours = $timeDifference->h + ($timeDifference->days * 24);

                            $rateperday = $hourlyrate * $timeDifferenceHours;
                            $addedregular =  $rateperday * 2;
                            $holidaypay += $addedregular;
                        }
                    }
                    
                    if(in_array($formatteddate, $specialholiday)){
                        
                        if(($row["fld_status"]=="Full Time") && ($row["fld_isPresent"] == 1)){
                            $rateperday = $basicsalary/$workingdays;
                            $addedspecial =  $rateperday * 0.30;
                            $holidaypay += $addedspecial;
                        }
                        else if(($row["fld_status"]=="Part Time") && ($row["fld_isPresent"] == 1)){
                            $mysqlschedstart = DateTime::createFromFormat('H:i:s', $schedstart);
                            $mysqlschedend = DateTime::createFromFormat('H:i:s', $schedend);
                            $timeDifference = $mysqlschedend->diff($mysqlschedstart);
                            $timeDifferenceHours = $timeDifference->h + ($timeDifference->days * 24);
                            
                            $rateperday = $hourlyrate * $timeDifferenceHours;
                            $addedregular =  $rateperday * 0.30;
                            $holidaypay += $addedregular;
                        }
                    }
                }


                //grosspay
                if(isset($bonuspay)){
                    $grosspay = $basicsalary + $overtimepay + $bonuspay + $holidaypay;
                }else{
                    $grosspay = $basicsalary + $overtimepay + $holidaypay;
                }
                
                //absent deduction
                
                $minusAmount_absent = $rateperday;
                $deductionabsent = $minusAmount_absent * $noofabsent;
                
                //late deduction
                $minusAmount_late = 2; //per minute
                $deductionlate = $minusAmount_late * $nooflate;

                //undertime deduction
                $minusAmount_undertime = 2; //per minute
                $deductionundertime = $minusAmount_undertime * $noofundertime;

                //total deduction
                $totaldeduction = $sss + $pagibig + $philhealth + $deductionabsent + $deductionlate + $deductionundertime;

                //netpay
                $netpay = $grosspay - $totaldeduction;

                //computation for parttime
                if(isset($bonuspay)){
                    $ptotalsalary = ($hourlyrate * $totalhoursworked) + $bonuspay + $holidaypay;
                }else{
                    $ptotalsalary = $hourlyrate * $totalhoursworked + $holidaypay;
                }
            }

            
            ?>
                
                <form action="salary.php"  method="get">
                <table width="100%">
                    <tr>
                        <td>Payroll Period: <input type="date" style="margin-left:1vw;"name="txt_payrollstart" value='<?php echo $payrollstart;?>' >&nbsp; to &nbsp;<input type="date" name="txt_payrollend" value='<?php echo $payrollend;?>' ></td>
                        <td >No. of Leave: <input type="text" style="text-align:center;" name="txt_noofleave" value='<?php echo $noofleave;?>' size="2" placeholder="..." ></td>
                        <td >No. of Off-Day: <input type="text" style="text-align:center;" name="txt_noofdayoff" value='<?php echo $noofdayoff;?>' size="2" placeholder="..." ></td>
                        <td>Bonus Pay: <input type="text" style="text-align:center;" name="txt_bonuspay" pattern="[0-9]+" value='<?php echo str_replace(',','',number_format($bonuspay ,2));?>' placeholder="..." ></td>
                    </tr>
                </table>
                
                
                <hr>
                <table width=450px>
                <tr> 
                    <td>Employee ID: <br><br></td>
                    <td><input type="text" name="slct_eid" onchange=this.form.submit() placeholder="Enter Employee's ID"> <br><br></td>
                </tr>
                </form> 
                    
            
            
                <form action=savesalary.php method=post>
            

                <tr>
                    <!--hidden input for id--><input type="hidden" name="txt_id" value='<?php echo $id;?>' readonly>
                    <!--hidden input for eid--><input type="hidden" name="txt_eid" value='<?php echo $eid;?>' readonly>
                    <!--hidden input for payrollstart--><input type="hidden" name="txt_hpayrollstart" value='<?php echo $payrollstart;?>' readonly>
                    <!--hidden input for payrollend--><input type="hidden" name="txt_hpayrollend" value='<?php echo $payrollend;?>' readonly>
                    <td>Name: <br><br></td>
                    <td><input type="text" name="txt_name" size=30 value='<?php echo $name;?>' required readonly><br><br></td>
                </tr>
                <tr>
                    <td>Status: <br><br></td>
                    <td><input type="text" name="txt_status" value='<?php echo $status;?>' readonly><br><br></td>
                </tr>
                </table>
        <hr>
             
            <?php
                if($status == "Full Time")
                {
                    include("fulltimesalary.php");
                }else if ($status == "Part Time")
                {
                    include("parttimesalary.php");
                }
                ?>

        <center>
            <table>
            <tr>
            <td><input type="submit" value="Add New Payroll Record" class="addbtn" >
        </td> 
            </form>
            <form action="salary.php">
                <td><input type="submit" value="Reset" class="resetbtn"></td>
            </form>
            </tr>
        </table>
        </center>
        
        <br>
        <br>
    </div>  
    <br>   <br>    
</body>
</html>
            
        
        
        