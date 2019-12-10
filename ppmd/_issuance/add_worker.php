<?php  
require_once('../DBcontroller.php');


$XID =  $_GET['xID'];
$XEMPLOYEES = $_POST['xEmployees'];
$XEMPLOYEES_2 = $_POST['xEmployees_2'];
$XEMPLOYEES_3 = $_POST['xEmployees_3'];
$XEMPLOYEES_4 = $_POST['xEmployees_4'];
$XEMPLOYEES_5 = $_POST['xEmployees_5'];
$XEMPLOYEES_6 = $_POST['xEmployees_6'];





if(isset($_POST['update_workerX'])){
	$newjob=$db->prepare("UPDATE jo_master
							SET
							EMPLOYEES=:ZEMPLOYEES,
							EMPLOYEES_2=:ZEMPLOYEES_2,
							EMPLOYEES_3=:ZEMPLOYEES_3,
							EMPLOYEES_4=:ZEMPLOYEES_4,
							EMPLOYEES_5=:ZEMPLOYEES_5,
							EMPLOYEES_6=:ZEMPLOYEES_6

							WHERE ID=:ZID");
			


			$newjob->bindparam(':ZEMPLOYEES',$XEMPLOYEES);
			$newjob->bindparam(':ZEMPLOYEES_2',$XEMPLOYEES_2);
			$newjob->bindparam(':ZEMPLOYEES_3',$XEMPLOYEES_3);
			$newjob->bindparam(':ZEMPLOYEES_4',$XEMPLOYEES_4);
			$newjob->bindparam(':ZEMPLOYEES_5',$XEMPLOYEES_5);
			$newjob->bindparam(':ZEMPLOYEES_6',$XEMPLOYEES_6);

			$newjob->bindparam(':ZID',$XID);

			$newjob->execute();






	header('location:edit.php?id='.$XID);
} 

?>
