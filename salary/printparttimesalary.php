<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print</title>
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

        $id = $_GET["txt_id"];
        $eid = "";
        $name = "";
        $status = "";
        $payrollstart = "";
        $payrollend = "";
        $bonuspay = "";
        $totalhoursworked = "";
        $noofpresent = "";
        $noofabsent = "";
        $hourlyrate = "";
        $totalsalaryPT = "";
        $holidaypay = "";


            $result = $conn->query("select * from payrolltb where id like '$id'");
                while($row = $result -> fetch_assoc()){
                    $eid = $row["fld_eid"];
                    $name = $row["fld_name"];
                    $status = $row["fld_status"];
                    $payrollstart = $row["fld_payrollstart"];
                    $payrollend = $row["fld_payrollend"];
                    $bonuspay = $row["fld_bonuspay"];
                    $totalhoursworked = $row["fld_totalhoursworked"];
                    $hourlyrate = $row["fld_hourlyrate"];
                    $totalsalaryPT = $row["fld_totalsalaryPT"];
                    $noofpresent = $row["fld_noofpresent"];
                    $noofabsent = $row["fld_noofabsent"];
                    $holidaypay = $row["fld_holidaypay"];
                }
        

    ?>
    <div class="container">
        <br>
        
        <div id="printDiv">
        
                <h3><b>Payslip for <?php echo $name?></b></h3>
                
                <div style="border-top: 1px solid black; border-bottom:1px solid black;">
                <br>
                Employee ID: <?php echo $eid; ?> <br>
                Status: <?php echo $status; ?><br>
                Payroll Period: <?php echo $payrollstart; ?> to <?php echo $payrollend; ?><br>
                No. of Present: <?php echo $noofpresent;?> <br>
                No. of Absent: <?php echo $noofabsent;?> <br>
                Total Hours Worked: <?php echo $totalhoursworked; ?> <br><br>
                </div>
                
                <table width="100%">
                    <tr>
                        <td><h4><b>Earnings</b></h</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Hourly Rate: </td>
                        <td>Php <?php echo $hourlyrate; ?></td>
                    </tr>
                    <tr>
                        <td>Holiday Pay: </td>
                        <td>Php <?php echo $holidaypay; ?></td>
                    </tr>
                    <tr>
                        <td>Other Bonuses: <br><br> </td>
                        <td>Php <?php echo $bonuspay; ?><br><br></td>
                    </tr>
                    <tr>
                       
                    <tr>
                        <td><b>Total Salary:</b> </td>
                        <td><b>Php <?php echo $totalsalaryPT; ?></b></td>
                    </tr>
                </table>
                <br>
           </div>
           <br>
                <center>
                <input type=button onclick=printPartOfPage() value=Print class=print>
                </center>
            
        <br><br>
    </div>
    <script>
    function printPartOfPage() {
			var printContent = document.getElementById("printDiv").innerHTML;
			var originalContent = document.body.innerHTML;
			document.body.innerHTML = printContent;
			window.print();
			document.body.innerHTML = originalContent;
		}
</script>
</body>
</html>