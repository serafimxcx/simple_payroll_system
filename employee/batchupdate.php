<?php
include("../connect.php");
$selectedRecords = $_POST['records'];

foreach ($selectedRecords as $recordID) {
    // Perform your update query here using the $recordID
    $conn->query("update employeetb SET fld_status = '$_POST[txt_batchstatus]' where fld_eid = '$recordID'"); ;
}

header("location: employee.php")
?>