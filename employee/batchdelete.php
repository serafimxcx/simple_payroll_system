<?php 
include("../connect.php");
$selectedRecords = $_POST['records'];

foreach ($selectedRecords as $recordID) {
    // Perform your update query here using the $recordID
    $conn->query("delete from employeetb where fld_eid = '$recordID'"); ;
}
header("location:employee.php");
?>