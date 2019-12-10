<?php
require_once('../../DBcontroller.php');
	

$name = $_POST['username'];
$pass = $_POST['password'];
$type = $_POST['usertype'];

	

if(isset($_POST['submit'])){

		$sql=$db->prepare("INSERT INTO accounts(username, password, usertype)
			VALUES(:username,:password,:usertype)");
		$sql->bindparam(':username',$name);
		$sql->bindparam(':password',$pass);
		$sql->bindparam(':usertype',$type);
		$sql->execute();
}
	header("location:index.php");
?>


