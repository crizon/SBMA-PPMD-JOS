<?php 
include_once('../../DBcontroller.php');

if(isset($_POST['cust_id'])){
	$stmt=$db->prepare("DELETE FROM customers WHERE customerID='".$_POST['cust_id']."'");
	$stmt->execute();
	echo "Record Deleted!";
}


 ?>