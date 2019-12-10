<?php
require_once('../../DBcontroller.php');
	

$employeename = $_POST['employeename'];
$section = $_POST['section'];
$notes = $_POST['notes'];

	

if(isset($_POST['submit'])){

		$sql=$db->prepare("INSERT INTO employee(EmployeeName, EmployeeSection, Enotes)
			VALUES(:employeename,:section,:notes)");
		$sql->bindparam(':employeename',$employeename);
		$sql->bindparam(':section',$section);
		$sql->bindparam(':notes',$notes);
		$sql->execute();
}
	header("location:index.php");
?>


