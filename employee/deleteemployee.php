<?php
	include("../connect.php");
	$conn->query("delete from employeetb where fld_eid='$_GET[txt_eid]'");

	header("location:employee.php");
?>