<?php 
include_once('../../DBcontroller.php');

if(isset($_POST['emp_id'])){
	$stmt=$db->prepare("DELETE FROM employee WHERE EmployeeID='".$_POST['emp_id']."'");
	$stmt->execute();
	echo "Record Deleted!";
}


 ?>