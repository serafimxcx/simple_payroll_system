<?php
    include("../connect.php");

    $result = $conn->query("select fld_eid from employeetb");
    while($row = $result -> fetch_assoc()){
        if($_POST["slct_eid"] != $row["fld_eid"]){
            header("location: dailyattendance.php");
        }
    }

   
        $conn -> query("update dailyattendancetb set fld_timeout='$_POST[txt_timeout]', fld_isOvertime='$_POST[txt_isOvertime]', fld_isUndertime='$_POST[txt_isUndertime]', fld_minutesUndertime ='$_POST[txt_minutesUndertime]', fld_minutesOvertime = '$_POST[txt_minutesOvertime]', fld_hoursworked='$_POST[txt_hoursworked]' where id like '$_POST[txt_id]'");

        $result = $conn->query("select * from dailyattendancetb where id = '$_POST[txt_id]'");
        while($row = $result -> fetch_assoc()){
            $id = $row["id"];
        }
        header("location: dailyattendance.php?txt_id=$id");
    

   
?>