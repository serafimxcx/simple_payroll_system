<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance Report</title>
    <?php
    include("../navbar.php");
    include("../connect.php");
    ?>
    <link rel="stylesheet" href="styleattendance.css">
    <script>
    function printPartOfPage() {
			var printContent = document.getElementById("printDiv").innerHTML;
			var originalContent = document.body.innerHTML;
			document.body.innerHTML = printContent;
			window.print();
			document.body.innerHTML = originalContent;
		}

</script>
</head>
<body>
<?php

        session_start();

        if (!isset($_SESSION['username'])) {
            // Redirect to the login page
            header('Location: ../index.php');
            exit();
          }
    ?>
    <div class="container">
    <br>
    
    <div class="attreport_container">
    <h3><b>Attendance Report</b></h3>
    <hr>
            <br>
           
            <form action="attendancereport.php"  method="get">
            Search Employee through ID or Name: <input type="text" name="slct_eid"><br><br>
            Search through Date: <input type="date" name="slct_payrollstart">&nbsp; to&nbsp; <input type="date" name="slct_payrollend"><br><br>
            <input type="submit" value="Search" class="searchbtn"> 
            <input type=button onclick=printPartOfPage() value=Print class=printbtn>
                
            </form>
            <br>
    </div>

            <br><br>
            <hr style="border: 1px solid black">
            <br><br>

    <div class="atable_container">
        <br>
    <?php
                if(empty($_GET['slct_eid']) && empty($_GET['slct_payrollstart']) && empty($_GET['slct_payrollend'])){
                    echo "
                    <div id=printDiv width=100%>
                    <table class='table table-striped' width=100% > 
                    <tr align=left>
                    <th>Date</th><th>Employee ID</th><th>Name</th><th>Present</th><th>Absent</th><th>Time In</th><th>No. of Minutes Late</th><th>Time Out</th><th>No. of Minutes Undertime</th><th>No. of Minutes Overtime</th><th>Hours Worked</th>
                    </tr>";

                    $result = $conn->query("select * from dailyattendancetb ORDER BY fld_date DESC, fld_timein DESC");
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
                    </table>
                    </div>      

                    </div>";
                    
                }else{
                    include("dailyattendancerecords.php");

                }
                
            ?>
            <br>
    </div>
            
<br><br>

</body>
</html>
