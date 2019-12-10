<?php 
include_once('../../DBcontroller.php');

if(isset($_POST['cust_id'])){
	$stmt=$db->prepare("DELETE FROM accounts WHERE UID='".$_POST['cust_id']."'");
	$stmt->execute();
	echo "Record Deleted!";
}


 ?>