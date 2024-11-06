<?php
	include("../connect.php");
	$conn->query("delete from employeepaytb where fld_eid='$_GET[txt_eid]'");

	header("location: employeepay.php");
?>