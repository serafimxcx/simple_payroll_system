
            <div id="printDiv" width="100%">

<?php

    

    //if only payroll period is used for search
    if(empty($_GET['slct_eid']) && isset($_GET['slct_payrollend'])){

        $result = $conn->query("select * from dailyattendancetb where fld_date BETWEEN '$_GET[slct_payrollstart]' AND '$_GET[slct_payrollend]' ORDER BY fld_date DESC");

        echo "
        <table>
        <tr>
            <td>Date: $_GET[slct_payrollstart] to $_GET[slct_payrollend] <br><br></td>
            </tr>
        </table>

                    <table class='table table-striped' width=100% > 
                    <tr align=left>
                    <th>Date</th><th>Employee ID</th><th>Name</th><th>Present</th><th>Absent</th><th>Time In</th><th>No. of Minutes Late</th><th>Time Out</th><th>No. of Minutes Undertime</th><th>No. of Minutes Overtime</th><th>Hours Worked</th>
                    </tr>";

        while($row = $result -> fetch_assoc()){
            echo "
                <tr>
                    <td>$row[fld_date]</td>
                    <td>$row[fld_eid]</td>
                    <td>$row[fld_name]</td>
                    <td>$row[fld_isPresent]</td>
                    <td>$row[fld_isAbsent]</td>
                    <td>$row[fld_timein]</td>
                    <td>$row[fld_minutesLate]</td>
                    <td>$row[fld_timeout]</td>
                    <td>$row[fld_minutesUndertime]</td>
                    <td>$row[fld_minutesOvertime]</td>
                    <td>$row[fld_hoursworked]</td>
                </tr>";
        }  

        echo "
        </table>";
    }
    
    // if only eid is used for search
    else if(isset($_GET['slct_eid']) && empty($_GET['slct_payrollend'])){
        $status = "";
        
        $statresult = $conn -> query("select * from dailyattendancetb where fld_eid = '$_GET[slct_eid]' OR fld_name like '%$_GET[slct_eid]%'");
        while($row = $statresult ->fetch_assoc()){
            $eid = $row["fld_eid"];
            $name = $row["fld_name"];
            $status = $row["fld_status"];
            $schedstart = $row["fld_schedstart"];
            $schedend = $row["fld_schedend"];
        }

        $resultpay = $conn-> query("select SUM(fld_isPresent) as no_of_present, SUM(fld_isAbsent) as no_of_absent, SUM(fld_minutesLate) as no_of_late, SUM(fld_minutesUndertime) as no_of_undertime, SUM(fld_minutesOvertime) as no_of_overtime, SUM(fld_hoursworked) as totalhoursworked from dailyattendancetb where fld_eid = '$_GET[slct_eid]' OR fld_name like '%$_GET[slct_eid]%'");
                while($row = $resultpay -> fetch_assoc()){
                    $noofpresent = $row["no_of_present"];
                    $noofabsent = $row["no_of_absent"];
                    $nooflate = $row["no_of_late"];
                    $noofundertime = $row["no_of_undertime"];
                    $noofovertime= $row["no_of_overtime"];
                    $totalhoursworked = $row["totalhoursworked"];
                }
        
        
            echo " 
            <table width = 100%>
            <tr>
            <td>Employee ID: $eid <br></td>
            </tr>
            <tr>
            <td>Name: $name <br></td>
            </tr>
            <tr>
            <td>Status: $status <br></td>
            </tr>
            <tr>
            <td>Schedule: $schedstart to $schedend <br><br></td>
            </tr>
            <tr>
            <td>No. of Present: $noofpresent</td>
            <td>No. of Absent: $noofabsent</td>
            <td>Total Minutes Late: $nooflate</td>
            <td>Total Minutes Undertime: $noofundertime</td>
            <td>Total Minutes Overtime: $noofovertime</td>
            <td>Total Hours Worked: $totalhoursworked</td>
            </tr>
            <table><br><br>
            ";
        

        if($status == "Full Time" || $status == "Part Time"){
            echo "
                    <table class='table table-striped' width=100% > 
                    <tr align=left>
                    <th>Date</th><th>Employee ID</th><th>Name</th><th>Present</th><th>Absent</th><th>Time In</th><th>No. of Minutes Late</th><th>Time Out</th><th>No. of Minutes Undertime</th><th>No. of Minutes Overtime</th><th>Hours Worked</th>
                    </tr>";

        }else if($status == ""){
            echo "Record does not exist.";
        }

        $result = $conn->query("select * from dailyattendancetb where fld_eid = '$_GET[slct_eid]' OR fld_name like '%$_GET[slct_eid]%' ORDER BY fld_date DESC");
        while($row = $result -> fetch_assoc()){
                echo "
                <tr>
                <td>$row[fld_date]</td>
                <td>$row[fld_eid]</td>
                <td>$row[fld_name]</td>
                <td>$row[fld_isPresent]</td>
                <td>$row[fld_isAbsent]</td>
                <td>$row[fld_timein]</td>
                <td>$row[fld_minutesLate]</td>
                <td>$row[fld_timeout]</td>
                <td>$row[fld_minutesUndertime]</td>
                <td>$row[fld_minutesOvertime]</td>
                <td>$row[fld_hoursworked]</td>
                </tr>";
            
        }

        echo"
        </table><br><br>
        ";

    }
    
    //if both eid and payroll period are search
    else if(isset($_GET['slct_eid']) && isset($_GET['slct_payrollend'])){
        $status = "";
        
        $statresult = $conn -> query("select * from dailyattendancetb where fld_eid = '$_GET[slct_eid]' OR fld_name like '%$_GET[slct_eid]%'");
        while($row = $statresult ->fetch_assoc()){
            $eid = $row["fld_eid"];
            $name = $row["fld_name"];
            $status = $row["fld_status"];
            $schedstart = $row["fld_schedstart"];
            $schedend = $row["fld_schedend"];
        }

        $resultpay = $conn-> query("select SUM(fld_isPresent) as no_of_present, SUM(fld_isAbsent) as no_of_absent, SUM(fld_minutesLate) as no_of_late, SUM(fld_minutesUndertime) as no_of_undertime, SUM(fld_minutesOvertime) as no_of_overtime, SUM(fld_hoursworked) as totalhoursworked from dailyattendancetb where fld_eid = '$_GET[slct_eid]' OR fld_name like '%$_GET[slct_eid]%'");
                while($row = $resultpay -> fetch_assoc()){
                    $noofpresent = $row["no_of_present"];
                    $noofabsent = $row["no_of_absent"];
                    $nooflate = $row["no_of_late"];
                    $noofundertime = $row["no_of_undertime"];
                    $noofovertime= $row["no_of_overtime"];
                    $totalhoursworked = $row["totalhoursworked"];
                }
        
        
            echo " 
            <table width = 100%>
            <tr>
            <td>Employee ID: $eid <br></td>
            </tr>
            <tr>
            <td>Name: $name <br></td>
            </tr>
            <tr>
            <td>Status: $status <br></td>
            </tr>
            <tr>
            <td>Schedule: $schedstart to $schedend <br><br></td>
            </tr>
            <tr>
            <td>Date: $_GET[slct_payrollstart] to $_GET[slct_payrollend] <br><br></td>
            </tr>
            <tr>
            <td>No. of Present: $noofpresent</td>
            <td>No. of Absent: $noofabsent</td>
            <td>Total Minutes Late: $nooflate</td>
            <td>Total Minutes Undertime: $noofundertime</td>
            <td>Total Minutes Overtime: $noofovertime</td>
            <td>Total Hours Worked: $totalhoursworked</td>
            </tr>
            <table><br><br>
            ";
        

        if($status == "Full Time" || $status == "Part Time"){
            echo "
                    <table class='table table-striped' width=100% > 
                    <tr align=left>
                    <th>Date</th><th>Employee ID</th><th>Name</th><th>Present</th><th>Absent</th><th>Time In</th><th>No. of Minutes Late</th><th>Time Out</th><th>No. of Minutes Undertime</th><th>No. of Minutes Overtime</th><th>Hours Worked</th>
                    </tr>";

        }else if($status == ""){
            echo "Record does not exist.";
        }

        $result = $conn->query("select * from dailyattendancetb where (fld_eid = '$_GET[slct_eid]' OR fld_name like '%$_GET[slct_eid]%') AND (fld_date BETWEEN '$_GET[slct_payrollstart]' AND '$_GET[slct_payrollend]') ORDER BY fld_date DESC");
        while($row = $result -> fetch_assoc()){
                echo "
                <tr>
                <td>$row[fld_date]</td>
                <td>$row[fld_eid]</td>
                <td>$row[fld_name]</td>
                <td>$row[fld_isPresent]</td>
                <td>$row[fld_isAbsent]</td>
                <td>$row[fld_timein]</td>
                <td>$row[fld_minutesLate]</td>
                <td>$row[fld_timeout]</td>
                <td>$row[fld_minutesUndertime]</td>
                <td>$row[fld_minutesOvertime]</td>
                <td>$row[fld_hoursworked]</td>
                </tr>";
            
        }

        echo"
        </table><br><br>
        ";
    }
   
?>
    </div>

                        

</div>



