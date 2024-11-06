<?php
    include("../connect.php");

    $result = $conn->query("select * from logintb where id = 1");
    while($row = $result -> fetch_assoc()){
        $id = $row["id"];
        $olduser = $row["fld_username"];
        $oldpass = $row["fld_password"];
    }

    if($_POST["txt_olduser"] == $olduser && $_POST["txt_oldpass"] == $oldpass){
        $conn -> query("update logintb set fld_username = '$_POST[txt_newuser]', fld_password = '$_POST[txt_newpass]', date_updated='$_POST[txt_dateupdated]' where id = 1");

        $updated = true;
        header("location: admin.php?txt_notif=$updated");
    }else{
        $updated = false;
        header("location: admin.php?txt_notif=$updated");
    }

?>