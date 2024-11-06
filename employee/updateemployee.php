<?php
    include("../connect.php");
    
    $conn->query("update employeetb set fld_lname='$_POST[txt_lname]', fld_fname='$_POST[txt_fname]', fld_mname='$_POST[txt_mname]', fld_addr='$_POST[txt_addr]', fld_num='$_POST[txt_num]', fld_email='$_POST[txt_email]', fld_status='$_POST[txt_status]', fld_schedstart='$_POST[txt_schedstart]', fld_schedend ='$_POST[txt_schedend]', fld_name ='$_POST[txt_lname], $_POST[txt_fname] $_POST[txt_mname]' where fld_eid like '$_POST[txt_eid]'");
    
    $conn->query("update employeepaytb set fld_name ='$_POST[txt_lname], $_POST[txt_fname] $_POST[txt_mname]' where fld_eid like '$_POST[txt_eid]'");

    $conn->query("update dailyattendancetb set fld_name ='$_POST[txt_lname], $_POST[txt_fname] $_POST[txt_mname]' where fld_eid like '$_POST[txt_eid]'");

    $conn->query("update payrolltb set fld_name ='$_POST[txt_lname], $_POST[txt_fname] $_POST[txt_mname]' where fld_eid like '$_POST[txt_eid]'");
    header("location: employee.php");
?>