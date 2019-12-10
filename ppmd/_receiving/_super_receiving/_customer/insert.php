<?php
include_once('../../DBcontroller.php');


if(!empty($_POST)){
	$output = '';
	$name = $_POST["name"];
	$notes = $_POST["notes"];

	if ($_POST["employee_id"] != '') {
		$stmt=$db->prepare("UPDATE customers SET customerName=:name, customerNotes=:notes WHERE customerID='".$_POST['employee_id']."'");
		$stmt->bindparam(':name',$name);
		$stmt->bindparam(':notes',$notes);
		
	}else{
		$sql=$db->prepare("INSERT INTO customers(customerName,customerNotes)
			VALUES(:name,:notes)");
		$sql->bindparam(':name',$name);
		$sql->bindparam(':notes',$notes);
		$sql->execute();
		
	}	
}
	header("location:index.php");
?>