<h3>Earnings</h3>
        <table width="100%">
            <br>
            <tr>
                <td>
                    Hourly Rate: <input type="text" name="txt_hourlyrate" value='<?php echo $hourlyrate;?>' placeholder="..." ><br><br>
                </td>
            </tr>
        </table>
        <hr>
        </table>
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
                <th></th><th></th> <th>Employee ID</th> <th>Name</th> <th>Hourly Rate</th>
                </tr>

                <?php

                    $result = $conn->query("select * from employeepaytb where fld_status = 'Part Time'");
                    while($row=$result->fetch_assoc()){
                    echo "<tr>
                        <td><a id=delete onclick=ask($row[fld_eid])><input type=submit class=delbtn value=Delete></a></td>
                        <td><a href=employeepay.php?txt_eid=$row[fld_eid]><input type=submit class=edtbtn value=Edit></a></td>
                        <td>$row[fld_eid]</td> 
                        <td> $row[fld_name] </td>
                        <td> $row[fld_hourlyrate] </td>
                    </tr>";
                }
                ?>
                </table>
            </div>

            
               