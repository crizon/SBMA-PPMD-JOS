<?php 
include_once('../DBcontroller.php');

session_start();
if(isset($_SESSION['account7'])){
?>


<!DOCTYPE html>
<html>
<head>
	<title>Error Requesting New JO</title>
	<meta http-equiv="refresh" content="5;url=index.php" />
	<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
	<style type="text/css">
		.spin-it{animation:w3-spin 2s infinite linear}@keyframes w3-spin{0%{transform:rotate(0deg)}100%{transform:rotate(359deg)}}
		.fade{animation:fading 10s infinite}@keyframes fading{0%{opacity:0}100%{opacity:1}}
	</style>
</head>
<body>
	
	<br><br><br><br>
	<center>
	<img class="fade" width="25%" src="../img/error.png">
	<h1>Error_Request on New Job Order No.</h1>
	<p>Please try again. You will be redirected automatically.</p>
	<span style="color:orange" class="fa fa-spinner spin-it"></span>
	</center>

</body>
</html>

<?php
}else{
  header('location:../index.php');
}
?>   