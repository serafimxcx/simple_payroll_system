<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="myscripts.js"></script>
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
        $basicsalary = "";
        $bonuspay = "";
        $grosspay = "";
        $sss = "";
        $pagibig = "";
        $philhealth = "";
        $overtimepay = "";
        $deductionabsent = "";
        $deductionlate = "";
        $deductionundertime = "";
        $totaldeductions = "";
        $netpay = "";
        $noofpresent = "";
        $noofabsent = "";
        $nooflate = "";
        $noofundertime = "";
        $noofovertime = "";
        $totalhoursworked = "";
        $holidaypay ="";


            $result = $conn->query("select * from payrolltb where id like '$id'");
                while($row = $result -> fetch_assoc()){
                    $eid = $row["fld_eid"];
                    $name = $row["fld_name"];
                    $status = $row["fld_status"];
                    $payrollstart = $row["fld_payrollstart"];
                    $payrollend = $row["fld_payrollend"];
                    $basicsalary = $row["fld_basicsalary"];
                    $sss = $row["fld_sss"];
                    $pagibig = $row["fld_pagibig"];
                    $philhealth = $row["fld_philhealth"];
                    $overtimepay = $row["fld_overtimepay"];
                    $bonuspay = $row["fld_bonuspay"];
                    $deductionabsent = $row["fld_deductionabsent"];
                    $deductionlate = $row["fld_deductionlate"];
                    $deductionundertime = $row["fld_deductionundertime"];
                    $netpay = $row["fld_netpay"];
                    $grosspay = $row["fld_grosspay"];
                    $totaldeductions = $row["fld_totaldeductions"];
                    $noofpresent = $row["fld_noofpresent"];
                    $noofabsent = $row["fld_noofabsent"];
                    $nooflate = $row["fld_nooflate"];
                    $noofundertime = $row["fld_noofundertime"];
                    $noofovertime = $row["fld_noofovertime"];
                    $totalhoursworked = $row["fld_totalhoursworked"];
                    $holidaypay =$row["fld_holidaypay"];
                }
        

    ?>
    <div class="container">
        <br>
        
        <div id="printDiv">
        
                <h3><b>Payslip for <?php echo $name?></b></h3>
                
                <div style="border-top: 1px solid black; border-bottom:1px solid black;">
                <br>
                <table width = "83%">
                    <tr>
                        <td>
                        Employee ID: <?php echo $eid; ?> <br>
                        Status: <?php echo $status; ?><br>
                        Payroll Period: <?php echo $payrollstart; ?> to <?php echo $payrollend; ?><br>
                        No. of Present: <?php echo $noofpresent;?> <br>
                        No. of Absent: <?php echo $noofabsent;?> <br><br>
                        </td>
                        <td>
                        Total Minutes Late: <?php echo $nooflate;?> <br>
                        Total Minutes Undertime: <?php echo $noofundertime;?> <br>
                        Total Minutes Overtime: <?php echo $noofovertime;?> <br>
                        Total Hours Worked: <?php echo $totalhoursworked; ?> <br><br>
                        </td>
                    </tr>
                </table>
                
                
                </div>
                
                <table width="100%">
                    <tr>
                        <td><h4><b>Earnings</b></h</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Basic Salary: </td>
                        <td>Php <?php echo $basicsalary; ?></td>
                    </tr>
                    <tr>
                        <td>Overtime Pay: </td>
                        <td>Php <?php echo $overtimepay; ?></td>
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
                        <td><b>Gross Pay: </b><br><br></td>
                        <td><b>Php <?php echo $grosspay; ?></b><br><br></td>
                    </tr>
                
                    <tr>
                        <td><h4><b>Deductions</b></h4></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>SSS: </td>
                        <td>( Php <?php echo $sss; ?> )</td>
                    </tr>
                    <tr>
                        <td>PAG-IBIG: </td>
                        <td>( Php <?php echo $pagibig; ?> )</td>
                    </tr>
                    <tr>
                        <td>PhilHealth: </td>
                        <td>( Php <?php echo $philhealth; ?> )</td>
                    </tr>
                    <tr>
                        <td>Absent: </td>
                        <td>( Php <?php echo $deductionabsent; ?> )</td>
                    </tr>
                    <tr>
                        <td>Late: </td>
                        <td>( Php <?php echo $deductionlate; ?> )</td>
                    </tr>
                    <tr>
                        <td>Undertime: <br><br> </td>
                        <td>( Php <?php echo $deductionundertime; ?> )<br><br></td>
                    </tr>
                    <tr>
                        <td><b>Total Deduction:</b> <br><br></td>
                        <td>( <b>Php <?php echo $totaldeductions; ?></b> )<br><br></td>
                    </tr>
                       
                    <tr>
                        <td><b>Net Pay:</b> </td>
                        <td><b>Php <?php echo $netpay; ?></b></td>
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