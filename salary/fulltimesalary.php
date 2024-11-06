  
        <div width="100%" >
            <br>             
            No. of Present Days: <input type="text" style="text-align:center;"  size="2" name="txt_noofpresent" value='<?php echo $noofpresent; ?>' readonly>&nbsp;&nbsp;
            Total Hours Worked: <input type="text" style="text-align:center;"  size="2" name="txt_totalhoursworked" id ="totalhoursworked" value='<?php echo $totalhoursworked; ?>'readonly>&nbsp;&nbsp;<br><br>
            No. of Absent: <input type="text" style="text-align:center;" size="2" name="txt_noofabsent" value='<?php echo $noofabsent; ?>' readonly>&nbsp;&nbsp;
            Total Minutes Late: <input type="text" style="text-align:center;"  size="2" name="txt_nooflate" value='<?php echo $nooflate; ?>'readonly>&nbsp;&nbsp;
            Total Minutes Undertime: <input type="text" style="text-align:center;"  size="2" name="txt_noofundertime" value='<?php echo $noofundertime; ?>'readonly>&nbsp;&nbsp;
            Total Minutes Overtime: <input type="text" style="text-align:center;"  size="2" name="txt_noofovertime" value='<?php echo $noofovertime; ?>'readonly>&nbsp;&nbsp;  
              
        </div><br>
        
        
        <hr>

        <div class="leftrightcontainer">
            <div class="left-div">
            <table>
                <tr>
                    <td>
                        <h3>Earnings</h3><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        Basic Salary: <br><br></td>
                        <td><input type="text" style="text-align:center;"  name="txt_basicsalary" id="basicsalary" value='<?php echo str_replace(',','',number_format($basicsalary, 2));?>' readonly><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        Overtime Pay: <br><br></td>
                        <td><input type="text" style="text-align:center;"  name="txt_overtimepay" id="overtimepay" value='<?php echo str_replace(',','',number_format($overtimepay,2));?>' readonly><br><br>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        Holiday Pay: &nbsp;&nbsp;<br><br></td>
                        <td><input type="text" style="text-align:center;"  name="txt_holidaypay" id="holidaypay" value='<?php echo str_replace(',','',number_format($holidaypay,2));?>' readonly><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        Other Bonuses: &nbsp;&nbsp;<br><br></td>
                        <td><input type="text" style="text-align:center;"  name="txt_bonuspay" id="bonuspay" value='<?php echo str_replace(',','',number_format($bonuspay,2));?>' readonly><br><br>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        Gross Pay: <br><br></td>
                        <td><input type="text" style="text-align:center;"  name="txt_grosspay" id="grosspay" value='<?php echo str_replace(',','',number_format($grosspay,2));?>'readonly><br><br>
                    </td>
                </tr>
            </table>
            </div>
            <div class="right-div">
            <table>
            <tr>
                <td><h3>Deductions</h3><br></td>
            </tr>
            <tr>
                <td > SSS: <br><br></td>
                        <td><input type="text" style="text-align:center; margin-right: 50px;"  name="txt_sss" id="sss" value='<?php echo str_replace(',','',number_format($sss,2));?>' readonly><br><br>
                </td>
                <td>
                    Absent:<br><br> </td>
                        <td><input type="text" style="text-align:center;"  name="txt_deductionabsent" id="deductionabsent" value='<?php echo str_replace(',','',number_format($deductionabsent,2));?>' readonly><br><br>
                </td>
            </tr>
            <tr>
                <td>
                    PAG-IBIG:<br><br> </td>
                        <td><input type="text" style="text-align:center;"  name="txt_pagibig" id="pagibig" value='<?php echo str_replace(',','',number_format($pagibig,2));?>' readonly><br><br>
                </td>
                <td>
                    Late: <br><br></td>
                        <td><input type="text" style="text-align:center;"  name="txt_deductionlate" id="deductionlate" value='<?php echo str_replace(',','',number_format($deductionlate,2));?>'  readonly><br><br>
                </td>
            </tr>
            <tr>
                <td>
                    PhilHealth: <br><br></td>
                        <td><input type="text" style="text-align:center;"  name="txt_philhealth" id="philhealth" value='<?php echo str_replace(',','',number_format($philhealth,2));?>' readonly><br><br>
                </td>
                <td>
                    Undertime: &nbsp;&nbsp;<br><br></td>
                        <td><input type="text" style="text-align:center;"  name="txt_deductionundertime" id="deductionundertime" value='<?php echo str_replace(',','',number_format($deductionundertime,2));?>' readonly><br><br>
                </td>
            </tr>
            <tr>
                <td><br><br></td> <td><br><br></td>
                <td><br><br></td> <td><br><br></td>
            </tr>
            <tr>
                <td>Total Deductions: <br><br></td>
                        <td><input type="text" style="text-align:center;"  name="txt_totaldeductions" id="totaldeductions" value='<?php echo str_replace(',','',number_format($totaldeduction,2));?>' readonly><br><br></td>
            </tr>
            </table>
            </div>
        </div>

      
        <hr>
            Net Pay: <input type="text" style="text-align:center; margin-left:3vw;" name="txt_netpay" id="netpay" value='<?php echo str_replace(',','',number_format($netpay,2));?>' readonly>
        <hr>
        <br>
        