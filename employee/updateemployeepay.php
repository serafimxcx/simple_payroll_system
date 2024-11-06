<?php
    include("../connect.php");
    
    if($_POST['txt_status'] == "Full Time")
    {
        $conn->query("update employeepaytb set fld_basicsalary='$_POST[txt_basicpay]', fld_SSS='$_POST[txt_sss]', fld_pagibig='$_POST[txt_pagibig]', fld_philhealth='$_POST[txt_philhealth]' where fld_eid like '$_POST[txt_eid]'");
    }
    else if($_POST['txt_status'] == "Part Time")
    {
        $conn->query("update employeepaytb set fld_hourlyrate='$_POST[txt_hourlyrate]' where fld_eid like '$_POST[txt_eid]'");
    }
    
    
    header("location: employeepay.php?txt_eid=$_POST[txt_eid]");
    
?>