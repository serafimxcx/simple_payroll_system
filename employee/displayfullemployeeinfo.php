<div>
    <br>
    <h3>Full Time</h3>
        <form action="e_report.php" method="get">
        Search Employee through ID or Name: <input type="TEXT" name="slct_eid" onchange="this.form.submit()"><br><br>
        <input type="hidden" name="txt_status" value="Full Time"><br>
        </form>
        
    </div>
    
    <table class="table table-striped"> 
                <tr>
                <th>Employee ID</th> <th> Name</th> <th>Address</th> <th>Mobile No.</th> <th>Email</th> <th>Status</th> <th>Start of Schedule</th> <th>End of Schedule</th><th>Basic Salary</th><th>SSS</th> <th>PAG-IBIG</th> <th>PhilHealth</th>
                </tr>
                <?php
                if(isset($_GET['slct_eid'])){
                    $result = $conn->query("select * from employeetb, employeepaytb where ((employeetb.fld_eid = '$_GET[slct_eid]' AND employeepaytb.fld_eid = '$_GET[slct_eid]') AND employeetb.fld_status = 'Full Time') OR ((employeepaytb.fld_name like '%$_GET[slct_eid]%' AND employeetb.fld_eid = employeepaytb.fld_eid)  AND employeetb.fld_status = 'Full Time')");
                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                        <td>$row[fld_eid]</td> 
                        <td> $row[fld_name] </td>
                        <td> $row[fld_addr] </td>
                        <td> $row[fld_num] </td>
                        <td> $row[fld_email] </td>
                        <td> $row[fld_status] </td>
                        <td> $row[fld_schedstart] </td>
                        <td> $row[fld_schedend] </td>
                        <td> $row[fld_basicsalary] </td>
                        <td> $row[fld_SSS] </td>
                        <td> $row[fld_pagibig] </td>
                        <td> $row[fld_philhealth] </td>
                        </tr>";

                    }
                }else{
                    $result = $conn->query("select * from employeetb, employeepaytb where employeetb.fld_eid=employeepaytb.fld_eid AND employeetb.fld_status = 'Full Time'");
                    while($row = $result->fetch_assoc()){
                        echo "<tr>
                        <td>$row[fld_eid]</td> 
                        <td> $row[fld_name] </td>
                        <td> $row[fld_addr] </td>
                        <td> $row[fld_num] </td>
                        <td> $row[fld_email] </td>
                        <td> $row[fld_status] </td>
                        <td> $row[fld_schedstart] </td>
                        <td> $row[fld_schedend] </td>
                        <td> $row[fld_basicsalary] </td>
                        <td> $row[fld_SSS] </td>
                        <td> $row[fld_pagibig] </td>
                        <td> $row[fld_philhealth] </td>
                        
                        </tr>";

                    }
                }

                    
                ?>
            </table>
           