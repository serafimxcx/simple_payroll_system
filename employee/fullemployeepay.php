    <h3>Earnings</h3>
        <table width="100%">
            <br>
            <tr>
                <td>
                    Basic Salary: <input type="text" name="txt_basicpay" value='<?php echo $basicsalary;?>' placeholder="..." style="margin-left:3vw;"><br><br>
                </td>
            </tr>
        </table>
        <hr>
        <h3>Deductions</h3>
        <table width="100%">
            <br>
            <tr>
                <td>
                    SSS: <input type="text" name="txt_sss" value='<?php echo $sss;?>' placeholder="..." ><br><br>
                </td>
                <td>
                    PAG-IBIG: <input type="text" name="txt_pagibig" value='<?php echo $pagibig;?>' placeholder="..." ><br><br>
                </td>
                <td>
                    PhilHealth: <input type="text" name="txt_philhealth" value='<?php echo $philhealth;?>' placeholder="..." ><br><br>
                </td>
            </tr>
        </table>
            <hr>
            <br>
            <!--buttons-->
            <table>
                <tr>
                    <td><input type="submit" value='<?php echo $savebtn;?>' class="addbtn"></td> 
            </form>

            <form action=employeepay.php>
                <td><input type="submit" value="Reset" class="resetbtn"></td>
            </form>
                </tr>
            </table>
                    <br>
    </div>
    <br><br>
            <hr style="border:1px solid black">
            <br><br>

            <div class="etable_container">
            <table class="table table-striped">
                <tr>
                <th></th><th></th> <th>Employee ID</th> <th>Name</th> <th>Basic Salary</th><th>SSS</th> <th>PAG-IBIG</th> <th>PhilHealth</th> 
                </tr>

                <?php
                    $result = $conn->query("select * from employeepaytb where fld_status = 'Full Time'");
                    while($row=$result->fetch_assoc()){
                    echo "<tr>
                        <td><a id=delete onclick=ask($row[fld_eid])><input type=submit class=delbtn value=Delete></a></td>
                        <td><a href=employeepay.php?txt_eid=$row[fld_eid]><input type=submit class=edtbtn value=Edit></a></td>
                        <td>$row[fld_eid]</td> 
                        <td> $row[fld_name] </td>
                        <td> $row[fld_basicsalary] </td>
                        <td> $row[fld_SSS] </td>
                        <td> $row[fld_pagibig] </td>
                        <td> $row[fld_philhealth] </td>
                    </tr>";
                }
                ?>
                </table>
            </div>
            
                