<?php 

require_once('DBcontroller.php');

$XUSERNAME = $_POST['xUsername'];
$XPASSWORD = $_POST['xPassword'];

$sql=$db->prepare("SELECT * FROM accounts WHERE username=:ZUSERNAME AND password=:ZPASSWORD");
$sql->bindParam(':ZUSERNAME',$XUSERNAME);
$sql->bindParam(':ZPASSWORD',$XPASSWORD);
$sql->execute();

$wee=$sql->fetch(PDO::FETCH_ASSOC);

$usertype=$wee['usertype'];
$username=$wee['username'];

//if existing ba yang account na nilogin mo
if($row=$sql->rowCount()<>0){

	

//if anong klaseng type (usertype) yang nilogin mo, tapos ireredirect nya depende. example if itong user ba na ito ay admin or normal lang then redirect sya dapat nyang kalagyan
	if ($usertype == '1') {
		session_start();
		$_SESSION['account1']=true;
		$_SESSION['presentUser']= $username;
		header('location:_inventory/index.php');
	}
	elseif ($usertype == '2') {
		session_start();
		$_SESSION['account2']=true;
		$_SESSION['presentUser']= $username;
		header('location:_inventory/_super_inventory/index.php');
	}
	elseif ($usertype == '3') {
		session_start();
		$_SESSION['account3']=true;
		$_SESSION['presentUser']= $username;
		header('location:_receiving/index.php');
	}
	elseif ($usertype == '4') {
		session_start();
		$_SESSION['account4']=true;
		$_SESSION['presentUser']= $username;
		header('location:_receiving/_super_receiving/index.php');
	}
	elseif ($usertype == '5') {
		session_start();
		$_SESSION['account5']=true;
		$_SESSION['presentUser']= $username;
		header('location:_issuance/index.php');
	}
	elseif ($usertype == '6') {
		session_start();
		$_SESSION['account6']=true;
		$_SESSION['presentUser']= $username;
		header('location:_issuance/_super_issuance/index.php');
	}
	elseif ($usertype == '7') {
		session_start();
		$_SESSION['account7']=true;
		$_SESSION['presentUser']= $username;
		header('location:_warehouse/index.php');
	}
	elseif ($usertype == '8') {
		session_start();
		$_SESSION['account8']=true;
		$_SESSION['presentUser']= $username;
		header('location:_warehouse/_super_warehouse/index.php');
	}
	elseif ($usertype == '0') {
		session_start();
		$_SESSION['account0']=true;
		$_SESSION['presentUser']= $username;
		header('location:_admin/index.php');
	}

}
else{ header('location:errorlogin.php');}
