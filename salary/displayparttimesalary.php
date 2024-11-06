<div>
<br>
    <h3>Part Time</h3>
        <form action="s_report.php" method="get">
        Search Employee through ID or Name: <input type="text" name="slct_eid" ><br><br>
        Search through Payroll Period: <input type="date" name="slct_payrollstart"> &nbsp;to&nbsp; <input type="date" name="slct_payrollend" ><br><br>
        <input type="hidden" name="txt_status" value="Part Time">
        <input type="submit" value="Search" class="searchbtn"><br><br>
        </form>
        
    </div>
    <table class="table table-striped"> 
                <tr>
                    <th></th><th>Employee ID</th><th>Name</th><th>Start of Period</th><th>End of Period</th><th>No. of Total Hours Worked</th><th>Hourly Rate</th><th>Bonus Pay</th><th>Total Salary</th>
                </tr>
                <?php
                    if(isset($_GET['slct_payrollend']) && empty($_GET['slct_eid'])){
                        $result = $conn->query("select * from payrolltb where (fld_payrollstart = '$_GET[slct_payrollstart]' AND fld_payrollend = '$_GET[slct_payrollend]') AND fld_status = 'Part Time'");
                        while($row = $result->fetch_assoc()){
                            echo "<tr>
                            <td><a href=printparttimesalary.php?txt_id=$row[id]><input type=submit class=printbtn value=View></a></td>
                            <td>$row[fld_eid]</td>
                            <td>$row[fld_name]</td>
                            <td>$row[fld_payrollstart]</td>
                            <td>$row[fld_payrollend]</td>
                            <td>$row[fld_totalhoursworked]</td>
                            <td>$row[fld_hourlyrate]</td>
                            <td>$row[fld_bonuspay]</td>
                            <td>$row[fld_totalsalaryPT]</td>
                            
                            </tr>";
    
                        }
                    }else if(isset($_GET['slct_eid']) && empty($_GET['slct_payrollend'])){
                        $result = $conn->query("select * from payrolltb where (payrolltb.fld_eid = '$_GET[slct_eid]' OR payrolltb.fld_name like '%$_GET[slct_eid]%') AND fld_status = 'Part Time'");
                        while($row = $result->fetch_assoc()){
                            echo "<tr>
                            <td><a href=printparttimesalary.php?txt_id=$row[id]><input type=submit class=printbtn value=View></a></td>
                            <td>$row[fld_eid]</td>
                            <td>$row[fld_name]</td>
                            <td>$row[fld_payrollstart]</td>
                            <td>$row[fld_payrollend]</td>
                            <td>$row[fld_totalhoursworked]</td>
                            <td>$row[fld_hourlyrate]</td>
                            <td>$row[fld_bonuspay]</td>
                            <td>$row[fld_totalsalaryPT]</td>
                            
                            </tr>";
    
                        }
                    }else if(isset($_GET['slct_eid']) && isset($_GET['slct_payrollend'])){
                        $result = $conn->query("select * from payrolltb where ((payrolltb.fld_eid = '$_GET[slct_eid]' OR payrolltb.fld_name like '%$_GET[slct_eid]%') AND fld_status = 'Part Time') AND ((fld_payrollstart = '$_GET[slct_payrollstart]' AND fld_payrollend = '$_GET[slct_payrollend]') AND fld_status = 'Part Time')");
                        while($row = $result->fetch_assoc()){
                            echo "<tr>
                            <td><a href=printparttimesalary.php?txt_id=$row[id]><input type=submit class=printbtn value=View></a></td>
                            <td>$row[fld_eid]</td>
                            <td>$row[fld_name]</td>
                            <td>$row[fld_payrollstart]</td>
                            <td>$row[fld_payrollend]</td>
                            <td>$row[fld_totalhoursworked]</td>
                            <td>$row[fld_hourlyrate]</td>
                            <td>$row[fld_bonuspay]</td>
                            <td>$row[fld_totalsalaryPT]</td>
                            
                            </tr>";
    
                        }
                    }
                    else{
                        $result = $conn->query("select * from payrolltb where fld_status = 'Part Time'");
                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                        <td><a href=printparttimesalary.php?txt_id=$row[id]><input type=submit class=printbtn value=View></a></td>
                        <td>$row[fld_eid]</td>
                        <td>$row[fld_name]</td>
                        <td>$row[fld_payrollstart]</td>
                        <td>$row[fld_payrollend]</td>
                        <td>$row[fld_totalhoursworked]</td>
                        <td>$row[fld_hourlyrate]</td>
                        <td>$row[fld_bonuspay]</td>
                        <td>$row[fld_totalsalaryPT]</td>
                        
                        </tr>";

                    }
                    }

                    
                ?>
            </table>
  