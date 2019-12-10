<?php
include_once('../../DBcontroller.php');


if(!empty($_POST)){
	$output = '';
	$name = $_POST["name"];
	$Xtype = $_POST["Xtype"];
	$notes = $_POST["notes"];

	if ($_POST["employee_id"] != '') {
		$stmt=$db->prepare("UPDATE customers SET customerName=:name, customerType=:Xtype,customerNotes=:notes WHERE customerID='".$_POST['employee_id']."'");
		$stmt->bindparam(':name',$name);
		$stmt->bindparam(':Xtype',$Xtype);
		$stmt->bindparam(':notes',$notes);
		
	}else{
		$sql=$db->prepare("INSERT INTO customers(customerName,customerType,customerNotes)
			VALUES(:name,:Xtype,:notes)");
		$sql->bindparam(':name',$name);
		$sql->bindparam(':Xtype',$Xtype);
		$sql->bindparam(':notes',$notes);
		$sql->execute();
		
	}	
}
	header("location:index.php");
?>