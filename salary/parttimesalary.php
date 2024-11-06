 
        <div width="100%" ><br>
            No. of Present Days: <input type="text" style="text-align:center;"  size="2" name="txt_noofpresent" value='<?php echo $noofpresent; ?>' readonly>&nbsp;&nbsp;
            No. of Absent: <input type="text" style="text-align:center;" size="2" name="txt_noofabsent" value='<?php echo $noofabsent; ?>' readonly>&nbsp;&nbsp;
            No. of Hours Worked: <input type="text" style="text-align:center;"  size="2" name="txt_totalhoursworked" id ="totalhoursworked" value='<?php echo $totalhoursworked; ?>' readonly>&nbsp;&nbsp;
        </div><br>
        <div>
            
          
        </div>
        <hr>
        <h3>Earnings</h3>
        <br>
        <table width=450px>
            <tr>
                <td>Hourly Rate: <br><br> </td>
                <td><input type="text" style="text-align:center;"  name="txt_hourlyrate" id="hourlyrate" value='<?php echo str_replace(',','',number_format($hourlyrate,2));?>' readonly><br><br></td>
            </tr>
            <tr>
                    <td>
                        Holiday Pay: &nbsp;&nbsp;<br><br></td>
                        <td><input type="text" style="text-align:center;"  name="txt_holidaypay" id="holidaypay" value='<?php echo str_replace(',','',number_format($holidaypay,2));?>' readonly><br><br>
                    </td>
                </tr>
            <tr>
                <td>Other Bonuses: <br><br></td>
                <td><input type="text" style="text-align:center;"  name="txt_bonuspay" id="bonuspay" value='<?php echo str_replace(',','',number_format($bonuspay,2));?>' readonly><br><br></td>
            </tr>
            <tr>
            <td>Part Time Total Salary: <br><br></td>
            <td><input type="text" style="text-align:center;"  name="txt_ptotalsalary" id="ptotalsalary" value='<?php echo str_replace(',','',number_format($ptotalsalary,2));?>'readonly><br><br></td>
            </tr>
        </table>
        <br>
        <hr>
       
        <br>
        