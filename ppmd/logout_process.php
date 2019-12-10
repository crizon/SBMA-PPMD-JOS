<?php
require_once('DBcontroller.php');

$username = $_POST['uname'];


$sql=$db->prepare("SELECT * FROM accounts WHERE username=:uname");
$sql->bindParam(':uname',$username);
$sql->execute();

session_start();
session_destroy();

header('location:index.php');

?>
