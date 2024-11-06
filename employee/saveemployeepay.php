<?php
    include("../connect.php");

    if($_POST['txt_name'] == ""){
        header("location: employeepay.php");
    }else{
        
        if($_POST['txt_status'] == "Full Time")
        {
            $conn -> query("insert into employeepaytb (fld_eid, fld_name,  fld_status, fld_basicsalary, fld_SSS, fld_pagibig, fld_philhealth) values('$_POST[txt_eid]', '$_POST[txt_name]', '$_POST[txt_status]', '$_POST[txt_basicpay]', '$_POST[txt_sss]','$_POST[txt_pagibig]','$_POST[txt_philhealth]')");
        }
        else if($_POST['txt_status'] == "Part Time")
        {
            $conn -> query("insert into employeepaytb (fld_eid, fld_name,  fld_status, fld_hourlyrate) values('$_POST[txt_eid]', '$_POST[txt_name]', '$_POST[txt_status]', '$_POST[txt_hourlyrate]')");
        }

    header("location: employeepay.php?txt_eid=$_POST[txt_eid]");
    }

    
        
    
?>