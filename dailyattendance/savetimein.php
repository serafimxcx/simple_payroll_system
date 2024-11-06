<?php
    include("../connect.php");

    $result = $conn->query("select fld_eid from employeetb");
    while($row = $result -> fetch_assoc()){
        if($_POST["slct_eid"] != $row["fld_eid"]){
            header("location: dailyattendance.php");
        }
    }

    
        $conn->query("update dailyattendancetb set fld_isPresent = '1', fld_isAbsent = '0', fld_timein = '$_POST[txt_timein]', fld_isLate = '$_POST[txt_isLate]', fld_minutesLate = '$_POST[txt_minutesLate]' where id like '$_POST[txt_id]' ");

        $result = $conn->query("select * from dailyattendancetb where id = '$_POST[txt_id]'");
        while($row = $result -> fetch_assoc()){
            $id = $row["id"];
        }

        header("location: dailyattendance.php?txt_id=$id");

   
?>

