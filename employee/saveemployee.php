<?php
    include("../connect.php");

    $eid = $_POST['txt_eid'];

    $resulteid = $conn -> query("select * from employeetb where fld_eid = '$eid'");

    if(mysqli_num_rows($resulteid) == 0){
        $conn -> query("insert into employeetb (fld_eid, fld_lname, fld_fname, fld_mname, fld_addr, fld_num, fld_email, fld_status, fld_schedstart, fld_schedend, fld_name) values('$_POST[txt_eid]', '$_POST[txt_lname]', '$_POST[txt_fname]', '$_POST[txt_mname]','$_POST[txt_addr]','$_POST[txt_num]','$_POST[txt_email]','$_POST[txt_status]', '$_POST[txt_schedstart]', '$_POST[txt_schedend]', '$_POST[txt_lname], $_POST[txt_fname] $_POST[txt_mname]' )");

        header("location: employee.php");
        
    }else{
        header("location: employee.php?duplicate_eid=$eid");
    }

   
?>