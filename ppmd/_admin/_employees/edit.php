<?php
include_once('../../DBcontroller.php');

if(isset($_POST["cust_id"]))
{
	$output='';
	$query=$db->query("SELECT * FROM customers WHERE customerID='".$_POST['cust_id']."'");
	$query->execute();
	$row=$query->fetch();
	echo json_encode($row);
}

?>